<?php

use App\Console\Commands\ImportPastScrobblesCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(ImportPastScrobblesCommand::class)->everyMinute();
