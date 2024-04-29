<?php

use App\Models\Post;
use App\PostKind;
use App\View\Components\PostExcerpt;
use Carbon\Carbon;

test('the post excerpt component will correctly render the given ARTICLE post title', function () {
    $post = new Post([
        'title' => 'My test Article',
        'content' => 'the test content for my post',
        'kind' => PostKind::ARTICLE,
        'slug' => 'my-test-post',
        'published_at' => new Carbon('25th December 2025'),
    ]);
    $this->component(PostExcerpt::class, ['post' => $post])
        ->assertSee('My test Article');
});

test('the post excerpt component will correctly render the given NOTE post content', function () {
    $post = new Post([
        'title' => '',
        'content' => 'the test content for my note',
        'kind' => PostKind::NOTE,
        'slug' => 'my-test-post',
        'published_at' => new Carbon('25th December 2025'),
    ]);
    $this->component(PostExcerpt::class, ['post' => $post])
        ->assertSee('the test content for my note');
});
