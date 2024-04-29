<?php

use App\Livewire\ListScrobbles;
use App\Models\Artist;
use App\Models\Listen;
use App\Models\Song;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Livewire;

use function Pest\Livewire\livewire;

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

test('the jam it component will load when authenticated', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));

    $artist = Artist::create([
        'name' => 'Test Artist',
        'mbid' => 11,
    ]);
    $song = Song::create([
        'title' => 'Test Song',
        'artist_id' => $artist->id,
    ]);
    Listen::create([
        'song_id' => $song->id,
        'published_at' => new Carbon('25th December 2024'),
    ]);

    livewire(ListScrobbles::class)
        ->assertSee('Jam It!');
    // $this->get('listens')
    //     ->assertSeeLivewire(ListScrobbles::class);
});
