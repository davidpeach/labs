<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CopyWpUrlToSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:copy-wp-url-to-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate wp_url values to the slug column.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Post::cursor()->each(function ($post) {
            $post->update([
                'slug' => $post->wp_url ?? Str::uuid(),
            ]);
        });
    }
}
