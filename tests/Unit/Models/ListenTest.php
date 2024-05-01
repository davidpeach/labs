<?php

use App\Models\Listen;
use App\Models\Song;

test('a listen belongs to a song', function () {
    $song = Song::factory()->create();
    $listen = Listen::factory()->create([
        'song_id' => $song->id,
    ]);

    expect($listen->song->title)->toEqual($song->title);
});
