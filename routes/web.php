<?php

use App\Models\Listen;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('scrobble-count', function () {
    return Listen::count();
});
