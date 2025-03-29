<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\PostKind;

class ArticleIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view(config('app.version').'.kinds.article.index', [
            'posts' => Post::where('kind', PostKind::ARTICLE)->orderBy('published_at', 'desc')->paginate(10),
        ]);
    }
}
