<?php

use App\Livewire\ListScrobbles;
use App\Models\Artist;
use App\Models\Listen;
use App\Models\Song;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ListScrobbles::class)
        ->assertStatus(200);
});

it('can reset the posts', function () {
    $artist = Artist::create([
        'name' => 'Test Artst',
        'mbid' => 111,
    ]);
    $song = Song::create([
        'title' => 'Test Song',
        'artist_id' => $artist->id,
    ]);
    $listenOne = Listen::create([
        'song_id' => $song->id,
    ]);
    $component = Livewire::test(ListScrobbles::class);
    $component->listens;
    expect($component->listens->count())->toEqual(1);
    $listenTwo = Listen::create([
        'song_id' => $song->id,
    ]);
    $component->listens;
    expect($component->listens->count())->toEqual(1);

    $component->call('nowListening');
    $component->listens;
    expect($component->listens->count())->toEqual(2);
});
