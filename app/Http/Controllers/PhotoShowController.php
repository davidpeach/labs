<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\PostKind;

class PhotoShowController extends Controller
{
    public function __invoke(Post $post)
    {
        if ($post->kind->getSlugPart() !== PostKind::PHOTO->getSlugPart()) {
            abort(404);
        }

        return view(config('app.version').'.kinds.photo.show', [
            'post' => $post,
        ]);
    }
}
