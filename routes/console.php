<?php

use App\Console\Commands\ImportNewScrobblesCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(ImportNewScrobblesCommand::class)->everyMinute();
