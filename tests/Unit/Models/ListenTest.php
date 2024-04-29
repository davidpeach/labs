<?php

use App\Models\Artist;
use App\Models\Listen;
use App\Models\Song;

test('a listen belongs to a song', function () {
    $artist = Artist::create([
        'name' => 'Test Artist',
        'mbid' => '111',
    ]);
    $song = Song::create([
        'title' => 'The Song',
        'artist_id' => $artist->id,
    ]);
    $listen = Listen::create([
        'song_id' => $song->id,
    ]);

    expect($listen->song->title)->toEqual('The Song');
});
