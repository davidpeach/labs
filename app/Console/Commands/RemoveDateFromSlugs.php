<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class RemoveDateFromSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-date-from-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::cursor();

        foreach ($posts as $post) {
            $slug = $post->slug;

            if (is_null($slug)) {
                continue;
            }

            $explodedSlug = explode('/', $slug);

            $newSlug = end($explodedSlug);

            $post->update([
                'slug' => $newSlug,
            ]);
        }
    }
}
