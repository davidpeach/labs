<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\PostKind;
use Illuminate\Http\Request;

class ArticleIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('posts', [
            'posts' => Post::where('kind', PostKind::ARTICLE)->orderBy('published_at', 'desc')->paginate(10),
        ]);
    }
}
