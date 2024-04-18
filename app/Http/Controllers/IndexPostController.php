<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexPostController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('posts', [
            'posts' => Post::paginate(10),
        ]);
    }
}
