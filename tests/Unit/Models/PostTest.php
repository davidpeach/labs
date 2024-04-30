<?php

use App\Models\Category;
use App\Models\Post;
use App\PostKind;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('the post permalink will be set correctly based on its post kind and slug', function ($kind, $permalinkBase) {
    config()->set('app.url', 'http://just-testing.lol');

    $post = new Post([
        'kind' => $kind,
        'slug' => 'my-test-post',
    ]);

    expect($post->permalink)->toEqual('http://just-testing.lol/'.$permalinkBase.'/my-test-post');
})->with([
    [
        PostKind::ARTICLE,
        'articles',
    ],
    [
        PostKind::NOTE,
        'notes',
    ],
    [
        PostKind::PHOTO,
        'photos',
    ],
]);

test('creating a post with markdown should correcly convert it to html', function () {
    Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'slug' => 'my-test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown',
        'published_at' => new Carbon('25th December 2025'),
    ]);

    $this->assertDatabaseHas(Post::class, [
        'user_id' => 1,
        'category_id' => 1,
        'slug' => 'my-test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown',
        'published_at' => '2025-12-25 00:00:00',
        'content' => "<p>this is just markdown</p>\n",
    ]);
});

test('a post can belong to a category', function () {
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

    expect($post->category->id)->toEqual($categoryOne->id);
});

test('media conversions', function () {
    $post = Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'slug' => 'my-test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown',
        'published_at' => new Carbon('25th December 2025'),
    ]);

    expect($post->mediaConversions)->toHaveCount(0);

    $post->registerMediaConversions(null);

    expect($post->mediaConversions)->toHaveCount(1);
});

test('the post featured image can be returned', function () {
    config()->set('media-library.disk_name', 'local');
    Storage::fake('local');

    $post = Post::create([
        'user_id' => 1,
        'category_id' => 1,
        'slug' => 'my-test-post',
        'format' => 'notneeded',
        'status' => 'unknown',
        'markdown' => 'this is just markdown',
        'published_at' => new Carbon('25th December 2025'),
    ]);

    expect($post->featured)->toEqual(null);

    $file = UploadedFile::fake()->image('some-file.jpg');

    $post = $post->fresh();

    $post->addMedia($file)
        ->toMediaCollection('inline_images');

    $featured = $post->getMedia('inline_images')->first();

    expect($post->featured)->toEqual($featured->getUrl('preview'));
});
