<?php

namespace App\Console\Commands;

use App\Models\backend\TimeLagged;
use Illuminate\Console\Command;
use Carbon\Carbon;

class Over8 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'over8:task';

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
        // dd();
        $users = TimeLagged::whereDate('created_at', date('Y-m-d'))->where('end_time', null)->pluck('created_by');
        // dd($users);
        foreach ($users as $key => $value) {
            # code...
            send_mail($value, 'message', $value->email, 'backend.email.over8', 'Tasks not completed today');
        }
        send_mail($users, 'message', env("Admin_Mail"), 'backend.email.over8admin', 'Tasks not completed today');

        return Command::SUCCESS;
    }
}
