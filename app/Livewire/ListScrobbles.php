<?php

namespace App\Livewire;

use App\Models\Listen;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListScrobbles extends Component
{
    use WithPagination;

    #[Computed]
    public function listens()
    {
        return Listen::orderBy('started_at', 'desc')->paginate(30);
    }

    public function render()
    {
        return view(config('app.version').'.livewire.list-scrobbles');
    }

    #[On('echo:listens,FoundNowPlaying')]
    public function nowListening()
    {
        unset($this->listens);
    }
}
