<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BoldTitledWrapper extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $titletag,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bold-titled-wrapper');
    }
}
