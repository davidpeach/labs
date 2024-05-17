<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\PostKind;
use Illuminate\Http\Request;

class PhotoIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return view(config('app.version').'.photos', [
            'posts' => Post::where('kind', PostKind::PHOTO)->orderBy('published_at', 'desc')->paginate(10),
        ]);
    }
}
