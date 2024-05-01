<?php

use App\Livewire\ListScrobbles;
use App\Models\Listen;
use App\Models\User;
use Livewire\Livewire;

use function Pest\Livewire\livewire;

it('renders successfully', function () {
    Livewire::test(ListScrobbles::class)
        ->assertStatus(200);
});

it('can reset the posts', function () {
    Listen::factory()->create();
    $component = Livewire::test(ListScrobbles::class);
    $component->listens;
    expect($component->listens->count())->toEqual(1);

    Listen::factory()->create();
    $component->listens;
    expect($component->listens->count())->toEqual(1);

    $component->call('nowListening');
    $component->listens;
    expect($component->listens->count())->toEqual(2);
});

test('the jam it component will load when authenticated', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));

    Listen::factory()->create();

    livewire(ListScrobbles::class)
        ->assertSee('Jam It!');
});

test('the jam it component wont load for guests', function () {
    Listen::factory()->create();

    livewire(ListScrobbles::class)
        ->assertDontSee('Jam It!');

});
