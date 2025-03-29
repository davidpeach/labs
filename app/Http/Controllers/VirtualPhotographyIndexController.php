<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\PostKind;
use Illuminate\Http\Request;

class VirtualPhotographyIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view(config('app.version').'.kinds.virtual-photography.index', [
            'posts' => Post::where('kind', PostKind::VIRTUAL_PHOTOGRAPHY)->orderBy('published_at', 'desc')->paginate(10),
        ]);
    }
}
