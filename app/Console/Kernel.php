<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\Everyday10_10::class
    ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('10am:task')->everyMinute();
        $schedule->command('over8:task')->everyMinute();
        $schedule->command('push:notification')->everyMinute();
        $schedule->command('over30:task')->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
