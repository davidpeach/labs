<?php

use App\Models\Artist;
use App\Models\Jam;
use App\Models\Song;
use Carbon\Carbon;

test('a jam belongs to a song', function () {
    $artist = Artist::create([
        'name' => 'Test Artist',
        'mbid' => '111',
    ]);
    $song = Song::create([
        'title' => 'The Song',
        'artist_id' => $artist->id,
    ]);
    $jam = Jam::create([
        'song_id' => $song->id,
        'published_at' => new Carbon('25th December 2025'),
    ]);

    expect($jam->song->title)->toEqual('The Song');
});
