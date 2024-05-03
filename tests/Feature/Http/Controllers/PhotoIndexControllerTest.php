<?php

declare(strict_types=1);

use App\Models\Post;
use App\PostKind;
use Carbon\Carbon;

test('photo posts can be viewed on the photos index page', function () {
    $postA = Post::factory()->create([
        'kind' => PostKind::PHOTO,
        'published_at' => new Carbon('1st January 2024'),
    ]);

    $postB = Post::factory()->create([
        'kind' => PostKind::PHOTO,
        'published_at' => new Carbon('10th January 2024'),
    ]);

    $postC = Post::factory()->create([
        'kind' => PostKind::ARTICLE,
        'published_at' => new Carbon('20th January 2024'),
    ]);

    $this->get(PostKind::PHOTO->getSlugPart())
        ->assertOk()
        ->assertViewHas('posts')
        ->assertSeeInOrder([
            $postB->title,
            $postA->title,
        ])
        ->assertDontSee($postC->title);
});
