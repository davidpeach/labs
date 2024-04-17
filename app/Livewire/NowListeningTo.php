<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;
use Livewire\Component;

class NowListeningTo extends Component
{
    public string $song;

    public function boot()
    {
        $this->nowListening();
    }

    public function render()
    {
        return view('livewire.now-listening-to');
    }

    #[On('echo:listens,FoundNowPlaying')]
    public function nowListening()
    {
        $this->song = Cache::get('now-listening', 'Not listening');
        $this->render();
    }
}
