<?php

use App\Livewire\NowListeningTo;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(NowListeningTo::class)
        ->assertStatus(200);
});
