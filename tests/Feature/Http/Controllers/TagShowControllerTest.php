<?php

declare(strict_types=1);

use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

test('a tag show page will show the posts tagged with that tag', function () {
    $tagOne = Tag::create([
        'name' => 'Tag One',
    ]);
    $tagTwo = Tag::create([
        'name' => 'Tag Two',
    ]);

    $postOne = Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'slug' => 'my-test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown',
        'published_at' => new Carbon('25th December 2025'),
    ]);
    $postTwo = Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'slug' => 'my-test-post-2',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown again',
        'published_at' => new Carbon('25th December 2025'),
    ]);

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
