<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TagShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($tag)
    {
        $posts = Post::withAnyTags($tag)->paginate(10);

        return view('posts', [
            'posts' => $posts,
        ]);
    }
}
