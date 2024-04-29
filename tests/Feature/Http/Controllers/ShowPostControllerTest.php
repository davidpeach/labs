<?php

declare(strict_types=1);

use App\Models\Post;
use App\PostKind;
use Carbon\Carbon;

test('a single post page will display the correct post content', function () {
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

    $this->get($post->permalink)
        ->assertOk()
        ->assertViewHas('post')
        ->assertSee('My Test Post</h1>', false)
        ->assertSee('<p>this is just markdown</p>', false);

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
