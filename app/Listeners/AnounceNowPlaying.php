<?php

namespace App\Listeners;

use App\Events\FoundNowPlaying;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AnounceNowPlaying
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FoundNowPlaying $event): void
    {
        //
    }
}
