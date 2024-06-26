<?php

namespace App\View\Components;

use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagCloud extends Component
{
    public $tags;

    public function __construct()
    {
        $this->tags = Tag::inRandomOrder()->take(47)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.tag-cloud');
    }
}
