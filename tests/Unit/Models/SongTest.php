<?php

use App\Models\Artist;
use App\Models\Song;

test('a song can belong to an aritst', function () {
    $artist = Artist::factory()->create();
    $song = Song::factory()->create([
        'artist_id' => $artist->id,
    ]);

    expect($song->artist->name)->toEqual($artist->name);
});
