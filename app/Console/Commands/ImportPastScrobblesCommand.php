<?php

namespace App\Console\Commands;

use App\ArtistCreditType;
use App\Http\Integrations\LastFm\LastFm;
use App\Http\Integrations\LastFm\Requests\GetRecentTracks;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Listen;
use App\Models\Song;
use Illuminate\Console\Command;

class ImportPastScrobblesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-past-scrobbles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import scrobbles LastFM';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $earliestListen = Listen::orderBy('started_at', 'asc')->first();

        $lastFm = new LastFm();
        $response = $lastFm->send(new GetRecentTracks(toTimestamp: $earliestListen?->started_at ?? 99999999999));
        $tracks = collect($response->json('recenttracks.track'));

        $tracks->each(function (array $track) {

            // TODO: handle now playing.
            if ((bool) data_get($track, '@attr.nowplaying') === true) {
                return;
            }

            $artist = Artist::firstOrCreate([
                'name' => $track['artist']['#text'],
                'mbid' => $track['artist']['mbid'],
            ]);

            $album = Album::firstOrCreate([
                'title' => $track['album']['#text'],
                'artist_id' => $artist->id,
            ]);

            $song = Song::firstOrCreate([
                'title' => $track['name'],
                'artist_id' => $artist->id,
            ]);

            $artist->songs()->syncWithoutDetaching([$song->id => ['credit_type' => ArtistCreditType::PERFORMER]]);
            $album->songs()->syncWithoutDetaching($song->id);

            Listen::firstOrCreate([
                'song_id' => $song->id,
                'started_at' => intval($track['date']['uts']),
            ]);
        });
    }
}
