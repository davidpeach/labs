<?php

use App\Http\Controllers\IndexPostController;
use App\Http\Controllers\ShowPostController;
use App\Livewire\ListScrobbles;
use App\Models\Listen;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('scrobble-count', function () {
    return Listen::count();
});

Route::get('post-count', function () {
    return Post::count();
});

Route::get('listens', ListScrobbles::class);

Route::get('posts', IndexPostController::class);

Route::get('{post:wp_url}', ShowPostController::class)->where('post', '(.*)');
