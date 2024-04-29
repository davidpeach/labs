<?php

declare(strict_types=1);

test('no env function to be used in app folder')
    ->expect('env')
    ->not->toBeUsed();

test('no dd function to be used in app folder')
    ->expect('dd')
    ->not->toBeUsed();

test('no dump function to be used in app folder')
    ->expect('dump')
    ->not->toBeUsed();
