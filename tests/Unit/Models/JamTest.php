<?php

use App\Models\Jam;
use App\Models\Song;

test('a jam belongs to a song', function () {
    $song = Song::factory()->create();
    $jam = Jam::factory()->create([
        'song_id' => $song->id,
    ]);

    expect($jam->song->title)->toEqual($song->title);
});
