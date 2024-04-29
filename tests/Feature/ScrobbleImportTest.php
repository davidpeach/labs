<?php

use App\ArtistCreditType;
use App\Events\FoundNowPlaying;
use App\Http\Integrations\LastFm\Requests\GetRecentTracks;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Listen;
use App\Models\Song;
use Illuminate\Support\Facades\Event;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

use function Pest\Laravel\assertDatabaseHas;

it('wont duplicate imported scrobbles', function () {
    MockClient::global([
        MockResponse::make(body: [
            'recenttracks' => [
                'track' => [
                    [
                        'artist' => [
                            '#text' => 'Scars on Broadway',
                            'mbid' => '12345',
                        ],
                        'album' => [
                            '#text' => 'Scars on Broadway',
                        ],
                        'name' => 'They Say',
                        'date' => [
                            'uts' => 1713214737,
                        ],
                    ],
                ],
            ],
        ]),
        MockResponse::make(body: [
            'recenttracks' => [
                'track' => [
                    [
                        'artist' => [
                            '#text' => 'Scars on Broadway',
                            'mbid' => '12345',
                        ],
                        'album' => [
                            '#text' => 'Scars on Broadway',
                        ],
                        'name' => 'More Recent Listen',
                        'date' => [
                            'uts' => 1713214738,
                        ],
                    ],
                    [
                        'artist' => [
                            '#text' => 'Scars on Broadway',
                            'mbid' => '12345',
                        ],
                        'album' => [
                            '#text' => 'Scars on Broadway',
                        ],
                        'name' => 'They Say',
                        'date' => [
                            'uts' => 1713214737,
                        ],
                    ],
                ],
            ],
        ]),
    ]);

    $this->artisan('app:import-new-scrobbles')->assertExitCode(0);

    expect(Artist::count())->toEqual(1);
    expect(Album::count())->toEqual(1);
    expect(Song::count())->toEqual(1);
    expect(Listen::count())->toEqual(1);

    $this->artisan('app:import-new-scrobbles')->assertExitCode(0);

    expect(Artist::count())->toEqual(1);
    expect(Album::count())->toEqual(1);
    expect(Song::count())->toEqual(2);
    expect(Listen::count())->toEqual(2);

    assertDatabaseHas('artists', [
        'name' => 'Scars on Broadway',
        'mbid' => '12345',
    ]);

    assertDatabaseHas('albums', [
        'title' => 'Scars on Broadway',
        'artist_id' => Artist::firstWhere(['name' => 'Scars on Broadway'])->id,
    ]);

    assertDatabaseHas('songs', [
        'title' => 'They Say',
    ]);

    assertDatabaseHas('artist_credit', [
        'artist_id' => Artist::first()->id,
        'song_id' => Song::first()->id,
        'credit_type' => ArtistCreditType::PERFORMER,
    ]);

    assertDatabaseHas('album_song', [
        'album_id' => Album::first()->id,
        'song_id' => Song::first()->id,
        'position' => null,
    ]);

    assertDatabaseHas('listens', [
        'song_id' => Song::first()->id,
        'started_at' => 1713214737,
    ]);
});
it('can save imported scrobbles', function () {
    MockClient::global([
        GetRecentTracks::class => MockResponse::fixture('recent'),
    ]);

    Event::fake();

    $this->artisan('app:import-new-scrobbles')->assertExitCode(0);

    Event::assertDispatched(FoundNowPlaying::class);

    expect(Listen::count())->toEqual(5);

    assertDatabaseHas('artists', [
        'name' => 'Scars on Broadway',
        'mbid' => '66f0dcaa-1680-4ef3-9b63-8b2ac24d0b58',
    ]);

    assertDatabaseHas('albums', [
        'title' => 'Scars on Broadway',
        'artist_id' => Artist::firstWhere(['name' => 'Scars on Broadway'])->id,
    ]);

    assertDatabaseHas('songs', [
        'title' => 'They Say',
    ]);

    assertDatabaseHas('artist_credit', [
        'artist_id' => Artist::first()->id,
        'song_id' => Song::first()->id,
        'credit_type' => ArtistCreditType::PERFORMER,
    ]);

    assertDatabaseHas('album_song', [
        'album_id' => Album::first()->id,
        'song_id' => Song::first()->id,
        'position' => null,
    ]);

    assertDatabaseHas('listens', [
        'song_id' => Song::first()->id,
        'started_at' => 1713214737,
    ]);
});
