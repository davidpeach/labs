<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Tags\Tag as BaseTag;

class Tag extends BaseTag
{
    use HasFactory;

    public function permalink(): Attribute
    {
        return Attribute::make(
            get: fn () => config('app.url').'/tags/'.$this->slug,
        );
    }
}
