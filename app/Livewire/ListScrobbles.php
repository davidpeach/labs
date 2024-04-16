<?php

namespace App\Livewire;

use App\Models\Listen;
use Livewire\Component;
use Livewire\WithPagination;

class ListScrobbles extends Component
{
    use WithPagination;

    public function render()
    {
        $listens = Listen::orderBy('started_at', 'desc')->paginate(20);

        return view('livewire.list-scrobbles', [
            'listens' => $listens,
        ]);
    }
}
