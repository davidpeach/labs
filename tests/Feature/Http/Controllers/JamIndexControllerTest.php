<?php

declare(strict_types=1);

use App\Models\Jam;
use Carbon\Carbon;

test('jams can be viewed on the jams index page', function () {
    $jamA = Jam::factory()->create([
        'published_at' => new Carbon('25th December 2025'),
    ]);
    $jamB = Jam::factory()->create([
        'published_at' => new Carbon('26th December 2025'),
    ]);

    $this->get('jams')
        ->assertOk()
        ->assertSeeInOrder([
            $jamB->song->title,
            $jamA->song->title,
        ]);
});
