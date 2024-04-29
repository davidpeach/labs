<?php

use App\Filament\Resources\ArtistResource;
use App\Filament\Resources\ArtistResource\Pages\CreateArtist;
use App\Models\User;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseHas;

it('can render the artist create admin page', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    $this->get(ArtistResource::getUrl('index'))->assertSuccessful();
});

it('can successfully fill out the create artist form', function () {
    Livewire::test(CreateArtist::class)
        ->fillForm([
            'name' => 'Test Artist',
            'mbid' => 11,
        ])
        ->call('create');

    assertDatabaseHas('artists', [
        'name' => 'Test Artist',
        'mbid' => 11,
    ]);
});
