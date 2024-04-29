<?php

use App\Models\User;
use Filament\Panel;

test('the correct ending email should be allowed to access the admin panel', function () {
    $user = User::make([
        'name' => 'Joe Bloggs',
        'email' => 'joe@davidpeach.co.uk',
    ]);

    expect($user->canAccessPanel(new Panel))->toBeTrue();
});
