<?php

declare(strict_types=1);

use App\Models\Post;
use App\PostKind;
use Carbon\Carbon;

test('the articles index page will show the articles', function () {
    $postA = Post::factory()->create([
        'published_at' => new Carbon('10th January 2024'),
        'kind' => PostKind::ARTICLE,
    ]);
    $postB = Post::factory()->create([
        'published_at' => new Carbon('1st January 2024'),
        'kind' => PostKind::ARTICLE,
    ]);
    $postC = Post::factory()->create([
        'published_at' => new Carbon('10th January 2024'),
        'kind' => PostKind::NOTE,
    ]);

    $this->get(PostKind::ARTICLE->getSlugPart())
        ->assertOk()
        ->assertViewHas('posts')
        ->assertSeeInOrder([
            $postA->title,
            $postB->title,
        ])
        ->assertDontSee($postC->title);
});
