<?php

use App\PostKind;

test('post kinds can return their label', function ($kind, $label) {
    expect($kind->getLabel())->toEqual($label);
})->with([
    [
        PostKind::ARTICLE,
        'Article',
    ],
    [
        PostKind::NOTE,
        'Note',
    ],
    [
        PostKind::PHOTO,
        'Photo',
    ],
]);
