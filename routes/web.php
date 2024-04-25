<?php

use App\Http\Controllers\ArticleIndexController;
use App\Http\Controllers\JamIndexController;
use App\Http\Controllers\NoteIndexController;
use App\Http\Controllers\PhotoIndexController;
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
Route::get('jams', JamIndexController::class)->name('jam.index');

Route::get('notes', NoteIndexController::class)->name('note.index');
Route::get('photos', PhotoIndexController::class)->name('photo.index');
Route::get('articles', ArticleIndexController::class)->name('article.index');

Route::get('tags/{tag:slug}', TagShowController::class)->name('tag.show');

Route::get('/{kind}/{post:slug}', ShowPostController::class)->where('post', '(.*)')->name('post.show');
