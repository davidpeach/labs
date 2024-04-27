<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\PostKind;
use Illuminate\Console\Command;

class MigratePhotoNotesToPhotoKinds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-photo-notes-to-photo-kinds';

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
        Category::where('name', 'LIKE', '%Photography')->each(function ($category) {
            $posts = $category->posts()->cursor();
            foreach ($posts as $post) {
                $post->update([
                    'kind' => PostKind::PHOTO,
                ]);
            }
        });
    }
}
