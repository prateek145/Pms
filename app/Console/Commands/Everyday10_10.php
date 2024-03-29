<?php

namespace App\Console\Commands;

use App\Models\backend\Task;
use App\Models\User;
use Illuminate\Console\Command;

class Everyday10_10 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '10am:task';

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
        $users = array_unique(User::where('role', '!=', 'admin')->pluck('id')->toArray());
        $users_task = array_unique(Task::where('start_date', date('Y-m-d'))->pluck('created_by')->toArray());
        $users_mail = array_diff($users, $users_task);
        $mail_users = User::whereIn('id', $users_mail)->get();
        $current_time = date('H:i');

        // dd($current_time == '12:34', $current_time, $mail_users);
        if (count($mail_users) > 0 && $current_time == '10:10') {
            # code...
            foreach ($mail_users as $key => $value) {
                # code...
                // dd($mail_users);
                send_mail($value, 'message', $value->email, 'backend.email.after10_10', 'No tasks for today?');
            }
            send_mail($mail_users, 'message', env("Admin_Mail"), 'backend.email.after10_10admin', 'Users with no tasks today');
            // dd();
        }
        return Command::SUCCESS;
    }
}
