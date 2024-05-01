<?php

use App\Filament\Resources\JamResource;
use App\Filament\Resources\JamResource\Pages\CreateJam;
use App\Models\Song;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseHas;

it('can render the jam create admin page', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    $this->get(JamResource::getUrl('create'))->assertSuccessful();
});

it('can successfully fill out the create jam form', function () {
    $song = Song::factory()->create();

    Livewire::test(CreateJam::class)
        ->fillForm([
            'song_id' => $song->id,
            'published_at' => new Carbon('25th December 2025'),
        ])
        ->call('create');

    assertDatabaseHas('jams', [
        'song_id' => $song->id,
    ]);
});
