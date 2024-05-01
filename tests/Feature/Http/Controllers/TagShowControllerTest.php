<?php

declare(strict_types=1);

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

test('a tag show page will show the posts tagged with that tag', function () {
    $tagOne = Tag::factory()->create();
    $tagTwo = Tag::factory()->create();

    $postOne = Post::factory()->create();
    $postTwo = Post::factory()->create();

    $postOne->attachTag($tagOne);
    $postOne->attachTag($tagTwo);

    $postTwo->attachTag($tagTwo);

    $response = $this->get('/tags/'.$tagOne->slug)
        ->assertOk()
        ->assertViewHas('posts');

    $this->assertInstanceOf(LengthAwarePaginator::class, $response->viewData('posts'));
    $this->assertEquals(1, $response->viewData('posts')->total());

    $response = $this->get('/tags/'.$tagTwo->slug)
        ->assertOk()
        ->assertViewHas('posts');

    $this->assertInstanceOf(LengthAwarePaginator::class, $response->viewData('posts'));
    $this->assertEquals(2, $response->viewData('posts')->total());
});
