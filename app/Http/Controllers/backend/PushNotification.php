<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PushNotification extends Controller
{
    public function index()
    {
        return view('pushindex');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification(Request $request)
    {
        // $user = auth()->user();
        $firebaseToken = User::find(auth()->id())->pluck('device_token');

        // dd($firebaseToken);
        $SERVER_API_KEY = 'AAAAcwF20DM:APA91bHtdOJHaTPNZCIdRfDaKUbQCp2KpOAiRRNUPKuI2afgMCevoVNOklMsZ5exc8207fZ81sh71W9xOF6czSv7ihOacaAcCs1_nKGkKiw5NHGefPnDDwoNFYHS9L-71V5G1eOySJGP';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
                "content_available" => true,
                "priority" => "high",
                // 'click_action' => 'https://github.com/suhasrkms/push-notification',
            ]
        ];
        // dd($data);
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        // dd($headers, $dataString);
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }

}
