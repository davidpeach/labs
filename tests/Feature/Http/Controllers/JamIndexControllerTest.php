<?php

declare(strict_types=1);

use App\Models\Artist;
use App\Models\Jam;
use App\Models\Song;
use Carbon\Carbon;

test('jams can be viewed on the jams index page', function () {

    $artist = Artist::create([
        'name' => 'Test Artist',
        'mbid' => 11,
    ]);
    $songOne = Song::create([
        'title' => 'Test Song',
        'artist_id' => $artist->id,
    ]);
    $songTwo = Song::create([
        'title' => 'Second Song',
        'artist_id' => $artist->id,
    ]);
    Jam::create([
        'song_id' => $songOne->id,
        'published_at' => new Carbon('25th December 2025'),
    ]);
    Jam::create([
        'song_id' => $songTwo->id,
        'published_at' => new Carbon('26th December 2025'),
    ]);

    $this->get('jams')
        ->assertOk()
        ->assertSeeInOrder([
            'Second Song',
            'Test Song',
        ]);
});
