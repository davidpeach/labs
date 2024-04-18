<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ShowPostController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }
}
