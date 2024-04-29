<?php

use App\Livewire\JamIt;
use App\Models\Artist;
use App\Models\Song;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseEmpty;
use function Pest\Laravel\assertDatabaseHas;

it('renders successfully', function () {
    $artist = Artist::create([
        'name' => 'Test Atrist',
        'mbid' => 11,
    ]);

    $song = Song::create([
        'title' => 'Test song',
        'artist_id' => $artist->id,
    ]);

    Livewire::test(JamIt::class, ['song' => $song->id])
        ->assertStatus(200)
        ->assertSet('song', $song->fresh());
});

it('can jam a given song when authenticated', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));

    $artist = Artist::create([
        'name' => 'Test Atrist',
        'mbid' => 11,
    ]);

    $song = Song::create([
        'title' => 'Test song',
        'artist_id' => $artist->id,
    ]);

    Carbon::setTestNow('25th December 2024');

    assertDatabaseEmpty('jams');

    Livewire::test(JamIt::class, ['song' => $song->id])
        ->call('jam');

    assertDatabaseHas('jams', [
        'song_id' => $song->id,
        'published_at' => new Carbon('25th December 2024'),
    ]);
});

test('unauthenicated people cannot jam a song', function () {
    $artist = Artist::create([
        'name' => 'Test Atrist',
        'mbid' => 11,
    ]);

    $song = Song::create([
        'title' => 'Test song',
        'artist_id' => $artist->id,
    ]);

    Livewire::test(JamIt::class, ['song' => $song->id])
        ->call('jam')
        ->assertUnauthorized();
});
