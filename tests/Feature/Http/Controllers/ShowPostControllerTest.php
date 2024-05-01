<?php

declare(strict_types=1);

use App\Models\Post;
use App\PostKind;

test('a single post page will display the correct post content', function () {
    $post = Post::factory()->create();

    $this->get($post->permalink)
        ->assertOk()
        ->assertViewHas('post')
        ->assertSee($post->title.'</h1>', false)
        ->assertSee($post->content, false);

});

test('accessing a single post with the wrong url base will result in 404', function () {
    $post = Post::factory()->create([
        'kind' => PostKind::ARTICLE,
    ]);

    $this->get(str_replace('articles', 'notes', $post->permalink))
        ->assertNotFound();
});
