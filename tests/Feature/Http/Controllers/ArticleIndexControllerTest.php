<?php

declare(strict_types=1);

use App\Models\Post;
use App\PostKind;
use Carbon\Carbon;

test('the articles index page will show the articles', function () {
    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => 'First article post',
        'slug' => 'my-test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown first',
        'published_at' => new Carbon('25th December 2025'),
        'kind' => PostKind::ARTICLE,
    ]);

    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => 'Second article post',
        'slug' => 'my-test-post-2',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown again',
        'published_at' => new Carbon('26th December 2025'),
        'kind' => PostKind::ARTICLE,
    ]);

    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'title' => '',
        'slug' => 'my-test-note',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just a note',
        'published_at' => new Carbon('25th December 2025'),
        'kind' => PostKind::NOTE,
    ]);

    $this->get(PostKind::ARTICLE->getSlugPart())
        ->assertOk()
        ->assertViewHas('posts')
        ->assertSeeInOrder([
            'Second article post',
            'First article post',
        ])
        ->assertDontSee('this is just a note');

});
