<?php
use Illuminate\Support\Facades\Mail;


function second_hours($sec)
{
    $value = gmdate("H:i:s", $sec);
    return $value;

}

function minutesin_hours($min){
    $value = intdiv($min, 60).':'. ($min % 60);
    return $value;
}

function send_mail($data, $message = null, $email){
    $mail = Mail::send('backend.email.task_create', ['body' => $data], function ($message) use ($email) {
        $message->sender(env('Admin_Mail'));
        $message->subject('Project Management');
        $message->to($email);
    });

    return $mail;
}