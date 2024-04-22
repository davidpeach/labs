<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexNoteController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('posts', [
            'posts' => Post::orderBy('published_at', 'desc')->paginate(10),
        ]);
    }
}
