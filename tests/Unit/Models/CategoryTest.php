<?php

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

test('a category can have a post', function () {
    $categoryOne = Category::create([
        'name' => 'Category One',
        'wp_id' => 1,
        'slug' => 'category-one',
        'description' => 'Category one description',
    ]);
    $post = Post::create([
        'title' => 'Test Post',
        'category_id' => $categoryOne->id,
        'markdown' => 'test post content',
        'user_id' => 1,
        'slug' => 'test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'published_at' => new Carbon('25th December 2025'),
    ]);

    expect($categoryOne->posts->first()->id)->toEqual($post->id);
});
