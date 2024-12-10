<?php

namespace App\Console\Commands;

use App\Importers\WordPress;
use Illuminate\Console\Command;

class ImportWordpressTings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-wordpress-tings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import content from my WordPress website.';

    /**
     * Execute the console command.
     */
    public function handle(WordPress $wordpress)
    {
        $wordpress->importPosts(1);
    }
}

