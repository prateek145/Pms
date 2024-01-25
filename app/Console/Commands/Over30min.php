<?php

namespace App\Console\Commands;

use App\Models\backend\Task;
use Illuminate\Console\Command;

class Over30min extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'over30:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tasks = Task::whereDate('created_at', date('Y-m-d'))->whereNot('status', 'cancel')->get();
        // dd($tasks);
        foreach ($tasks as $key => $value) {
            # code...
            date_default_timezone_set('Asia/Kolkata');
            $time = strtotime($value->end_time);
            $current_time = date('H:i');
            $end_time = date("H:i", strtotime('+30 minutes', $time));
            // dd($current_time > $end_time, $value->tasklagged_one->end_time == '');
            $user = $value->task_user;

            // dd($end_time, $current_time, $current_time > $end_time, $value->tasklagged_one->end_time == '', $user);
            if ($current_time > $end_time && $value->tasklagged_one->end_time == '') {
                # code...
                send_mail($value, 'message', $user->email, 'backend.email.over30min', 'Allocated time has passed');

            }

        }
        return Command::SUCCESS;
    }
}
