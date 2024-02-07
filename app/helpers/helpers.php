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

function send_mail($data, $message = null, $email, $template, $subject = 'Project Management'){
    $mail = Mail::send($template, ['body' => $data], function ($message) use ($email, $subject) {
        $message->sender(env('MAIL_FROM_ADDRESS'));
        $message->subject($subject);
        $message->to($email);
    });
    // dd($mail);

    
    return $mail;
}