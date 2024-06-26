<?php

namespace App\Http\Controllers;

use App\Models\Post;

class TagShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($tag)
    {
        $posts = Post::withAnyTags($tag)->paginate(10);

        return view(config('app.version').'.posts', [
            'posts' => $posts,
        ]);
    }
}
