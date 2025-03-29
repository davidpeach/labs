<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\PostKind;

class ArticleShowController extends Controller
{
    public function __invoke(Post $post)
    {
        if ($post->kind->getSlugPart() !== PostKind::ARTICLE->getSlugPart()) {
            abort(404);
        }

        return view(config('app.version').'.kinds.article.show', [
            'post' => $post,
        ]);
    }
}
