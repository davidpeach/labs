<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Post;
use App\PostKind;
use Illuminate\Http\Request;

class VirtualPhotographyShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Game $game, Post $post)
    {
        if ($post->kind->getSlugPart() !== PostKind::VIRTUAL_PHOTOGRAPHY->getSlugPart()) {
            abort(404);
        }

        return view(config('app.version').'.kinds.virtual-photography.show', [
            'post' => $post,
        ]);
    }
}
