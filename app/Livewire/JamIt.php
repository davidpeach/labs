<?php

namespace App\Livewire;

use App\Models\Jam;
use App\Models\Song;
use Carbon\Carbon;
use Livewire\Component;

class JamIt extends Component
{
    public $song;

    public bool $jammed = false;

    public function mount(Song $song)
    {
        $this->song = $song;
    }

    public function render()
    {
        return view(config('app.version').'.livewire.jam-it');
    }

    public function jam()
    {
        if (auth()->guest()) {
            abort(401);
        }
        $this->song->jams()->save(
            Jam::make([
                'published_at' => Carbon::now(),
            ]),
        );

        $this->jammed = true;
    }
}
