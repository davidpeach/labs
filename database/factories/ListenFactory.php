<?php

namespace Database\Factories;

use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listen>
 */
class ListenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'song_id' => Song::factory(),
            'started_at' => (new Carbon('25th December 2024'))->getTimestamp(),
        ];
    }
}
