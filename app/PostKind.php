<?php

namespace App;

use Filament\Support\Contracts\HasLabel;

enum PostKind: int implements HasLabel
{
    case NOTE = 1;
    case ARTICLE = 2;
    case PHOTO = 3;

    public function getSlugPart(): ?string
    {
        return match ($this) {
            self::NOTE => 'notes',
            self::ARTICLE => 'articles',
            self::PHOTO => 'photos',
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NOTE => 'Note',
            self::ARTICLE => 'Article',
            self::PHOTO => 'Photo',
        };
    }
}
