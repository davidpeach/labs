<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\PostKind;

class NoteShowController extends Controller
{
    public function __invoke(Post $post)
    {
        if ($post->kind->getSlugPart() !== PostKind::NOTE->getSlugPart()) {
            abort(404);
        }

        return view(config('app.version').'.kinds.note.show', [
            'post' => $post,
        ]);
    }
}
