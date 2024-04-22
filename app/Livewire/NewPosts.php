<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class NewPosts extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $posts;

    public function mount()
    {
        $this->posts = [];
    }

    public function render()
    {
        return view('livewire.new-posts');
    }

    #[On('echo:new-post,PostCreated')]
    public function lolcat($event)
    {
        $this->posts[] = 'Another';
        $this->dispatch('refreshComponent');
    }
}
