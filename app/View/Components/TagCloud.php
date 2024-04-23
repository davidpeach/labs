<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Spatie\Tags\Tag;

class TagCloud extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Collection $tags,
    ) {
        $this->tags = Tag::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.tag-cloud');
    }
}