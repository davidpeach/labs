<?php

declare(strict_types=1);

use App\Models\Post;
use App\PostKind;
use Carbon\Carbon;

test('photo posts can be viewed on the photos index page', function () {
    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => 'My Photo Post 1',
        'slug' => 'my-test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown first',
        'published_at' => new Carbon('25th December 2025'),
        'kind' => PostKind::PHOTO,
    ]);

    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => 'My Photo Post 2',
        'slug' => 'my-test-post-2',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown again',
        'published_at' => new Carbon('25th December 2025'),
        'kind' => PostKind::PHOTO,
    ]);

    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => 'A note post',
        'slug' => 'my-test-note',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just a note',
        'published_at' => new Carbon('25th December 2025'),
        'kind' => PostKind::NOTE,
    ]);

    $this->get(PostKind::PHOTO->getSlugPart())
        ->assertOk()
        ->assertViewHas('posts')
        ->assertSee('My Photo Post 1', false)
        ->assertSee('My Photo Post 2', false)
        ->assertDontSee('A note post');

});

test('accessing a single post with the wrong url base will result in 404', function () {
    $post = Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => 'My Test Post',
        'slug' => 'my-test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown',
        'published_at' => new Carbon('25th December 2025'),
        'kind' => PostKind::ARTICLE,
    ]);

    $this->get(str_replace('articles', 'notes', $post->permalink))
        ->assertNotFound();
});
