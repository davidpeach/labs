<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ShowPostController extends Controller
{
    public function __invoke(string $kind, Post $post)
    {
        if ($post->kind->getSlugPart() !== $kind) {
            abort(404);
        }

        return view(config('app.version').'.post', [
            'post' => $post,
        ]);
    }
}
