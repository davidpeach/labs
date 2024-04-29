<?php

declare(strict_types=1);

use App\Models\Post;
use App\PostKind;
use Carbon\Carbon;

test('the notes index page will show the notes', function () {
    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => '',
        'slug' => 'my-test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown first',
        'published_at' => new Carbon('25th December 2025'),
        'kind' => PostKind::NOTE,
    ]);

    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => '',
        'slug' => 'my-test-post-2',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown again',
        'published_at' => new Carbon('25th December 2025'),
        'kind' => PostKind::NOTE,
    ]);

    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => '',
        'slug' => 'my-test-note',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just an article',
        'published_at' => new Carbon('25th December 2025'),
        'kind' => PostKind::ARTICLE,
    ]);

    $this->get(PostKind::NOTE->getSlugPart())
        ->assertOk()
        ->assertViewHas('posts')
        ->assertSee('this is just markdown first', false)
        ->assertSee('this is just markdown again', false)
        ->assertDontSee('this is just an article');

});
