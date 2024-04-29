<?php

declare(strict_types=1);

use App\Events\FoundNowPlaying;
use Illuminate\Broadcasting\PendingBroadcast;

test('the broadcast method should work', function () {
    config()->set('broadcasting.default', null);

    $event = new FoundNowPlaying();

    expect($event->broadcast())->toBeInstanceOf(PendingBroadcast::class);
});
