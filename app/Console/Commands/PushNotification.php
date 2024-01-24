<?php

namespace App\Console\Commands;

use App\Models\backend\Task;
use App\Models\PushSubscription;
use Illuminate\Console\Command;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

class PushNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:notification';

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
        $tasks = Task::whereDate('created_at', date('Y-m-d'))->get();
        // dd($tasks);
        foreach ($tasks as $key => $value) {
            # code...
            // dd($value->tasklagged_one);
            date_default_timezone_set('Asia/Kolkata');
            $time = strtotime($value->end_time);
            $current_time = date('H:i');
            $end_time = date("H:i", strtotime($time));
            // dd($current_time > $end_time, $value->tasklagged_one->end_time == '');

            $user = $value->task_user;

            // dd($end_time, $current_time, $current_time > $end_time, $value->tasklagged_one->end_time == '', $user);
          
            if ($current_time > $end_time && $value->tasklagged_one->end_time == '') {
                # code...
                $this->SendNotification('Task Time Completed', $value->name, route('tasks.edit', $value->id), $value->allocated_user);
            }
        }
        return Command::SUCCESS;
    }

    public function SendNotification($title, $body, $url, $user_id)
    {

        $webPush = new WebPush([
            "VAPID" => [
                "publicKey" => "BH_3PDMod9Me70Zz27uSCNapPS2HNMsa3zjMiAk9IZUUK20AHrQF3G-R7Ktkq_DTInnGc6X0qT-MBGSoBdQHXJM",
                "privateKey" => "450tJbM2jNtlVrKUeWXJRCsLWdDbOZasYAD8PeiMvKQ",
                "subject" => $url ?? ""
            ]
        ]);

        $array = [
            'title' => $title,
            'body' => $body,
            'url' => $url
        ];

        $subs = PushSubscription::where('user_id', $user_id)->first();
        // dd($subs, $user_id);
        if ($subs) {
            # code...
            $result = $webPush->sendOneNotification(
                Subscription::create(json_decode($subs->data, true)),
                json_encode($array)
            );
        }
        // dd($result);
    }
}
