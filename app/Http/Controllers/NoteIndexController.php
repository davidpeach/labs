<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\PostKind;
use Illuminate\Http\Request;

class NoteIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return view(config('app.version').'.posts', [
            'posts' => Post::where('kind', PostKind::NOTE)->orderBy('published_at', 'desc')->paginate(10),
        ]);
    }
}
