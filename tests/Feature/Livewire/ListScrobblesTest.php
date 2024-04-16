<?php

use App\Livewire\ListScrobbles;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ListScrobbles::class)
        ->assertStatus(200);
});
