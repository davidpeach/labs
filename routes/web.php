<?php

use App\Http\Controllers\IndexNoteController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\TagShowController;
use App\Livewire\ListScrobbles;
use App\Models\Listen;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('scrobble-count', function () {
    return Listen::count();
});

Route::get('post-count', function () {
    return Post::count();
});

Route::get('listens', ListScrobbles::class)->name('listen.index');

Route::get('notes', IndexNoteController::class)->name('note.index');

Route::get('tags/{tag:slug}', TagShowController::class)->name('tag.show');

Route::get('/notes/{post:wp_url}', ShowPostController::class)->where('post', '(.*)')->name('note.show');
