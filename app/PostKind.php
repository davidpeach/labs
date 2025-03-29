<?php

namespace App;

use Filament\Support\Contracts\HasLabel;

enum PostKind: int implements HasLabel
{
    case NOTE = 1;
    case ARTICLE = 2;
    case PHOTO = 3;
    case VIRTUAL_PHOTOGRAPHY = 4;

    public function getSlugPart(): ?string
    {
        return match ($this) {
            self::NOTE => 'notes',
            self::ARTICLE => 'articles',
            self::PHOTO => 'photos',
            self::VIRTUAL_PHOTOGRAPHY => 'virtual-photography',
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NOTE => 'Note',
            self::ARTICLE => 'Article',
            self::PHOTO => 'Photo',
            self::VIRTUAL_PHOTOGRAPHY => 'Virtual Photography',
        };
    }

    public function getViewName(): ?string
    {
        return match ($this) {
            self::NOTE => 'note',
            self::ARTICLE => 'article',
            self::PHOTO => 'photo',
            self::VIRTUAL_PHOTOGRAPHY => 'virtual-photography',
        };
    }
}
