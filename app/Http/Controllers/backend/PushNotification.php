<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\PushSubscription;
use App\Models\User;
use Illuminate\Http\Request;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

class PushNotification extends Controller
{
    public function index()
    {
        $subscriptions = PushSubscription::all();
        return view('pushindex', compact('subscriptions'));
    }

    public function SendNotification(Request $request) {

        $webPush = new WebPush([
            "VAPID" => [
                "publicKey" => "BH_3PDMod9Me70Zz27uSCNapPS2HNMsa3zjMiAk9IZUUK20AHrQF3G-R7Ktkq_DTInnGc6X0qT-MBGSoBdQHXJM",
                "privateKey" => "450tJbM2jNtlVrKUeWXJRCsLWdDbOZasYAD8PeiMvKQ",
                "subject" => $request->url ?? ""
            ]
        ]);

        // dd($request->input());
        $subs = PushSubscription::where('user_id', $request->user_id)->first();
        $result = $webPush->sendOneNotification(
            Subscription::create(json_decode($subs->data, true)),
            json_encode($request->input())
        );
        // dd($result);
    }

    public function CreateSubscription(Request $request) {
        // dd($request->all(), auth()->id());
        PushSubscription::create([
            'data' => $request->subscription,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully created subscription'
        ]);
    }

}
