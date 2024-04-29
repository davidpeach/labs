<?php

use App\Models\Artist;
use App\Models\Song;

test('a song can belong to an aritst', function () {
    $artist = Artist::create([
        'name' => 'Test Artist',
        'mbid' => '111',
    ]);
    $song = Song::create([
        'title' => 'The Song',
        'artist_id' => $artist->id,
    ]);

    expect($song->artist->name)->toEqual('Test Artist');
});
