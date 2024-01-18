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
        $schedule->command('10am:task')->when(function(){
            $current_time = date('H:i:s');
            if ($current_time == '10:10:00') {
                # code...
                return true;
            }else{
                return false;
            }
        })->daily();

        $schedule->command('over8:task')->when(function(){
            $current_time = date('H:i:s');
            if ($current_time == '20:00:00') {
                # code...
                return true;
            }else{
                return false;
            }
        })->daily();

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
