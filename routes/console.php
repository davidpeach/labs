<?php

use App\Console\Commands\ImportNewScrobblesCommand;
use App\Console\Commands\ImportPastScrobblesCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(ImportPastScrobblesCommand::class)->everyMinute();
Schedule::command(ImportNewScrobblesCommand::class)->everyMinute();
