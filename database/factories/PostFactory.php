<?php

namespace Database\Factories;

use App\Models\User;
use App\PostKind;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'user_id' => User::factory(),
            'category_id' => 1,
            'title' => $title,
            'slug' => Str::kebab($title),
            'format' => 'notneeded',
            'status' => 'unknown',
            'markdown' => 'this is just markdown first',
            'published_at' => new Carbon('25th December 2025'),
            'kind' => PostKind::ARTICLE,
        ];
    }
}
