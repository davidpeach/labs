<?php

use App\Models\Post;
use App\View\Components\PostExcerpt;

test('the post excerpt component will correctly render the given ARTICLE post title', function () {
    $post = Post::factory()->create();
    $this->component(PostExcerpt::class, ['post' => $post])
        ->assertSee($post->title);
});

test('the post excerpt component will correctly render the given NOTE post content', function () {
    $post = Post::factory()->create([
        'title' => '',
    ]);

    $this->component(PostExcerpt::class, ['post' => $post])
        ->assertSee($post->content, false);
});
