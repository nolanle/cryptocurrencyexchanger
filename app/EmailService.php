<?php

namespace App;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;

class EmailService
{
    public function registeredEmail($user = null, $password='', $ip='')
    {
        Mail::send('emails.registered', ['user' => $user, 'password' => $password, 'ip' => $ip], function (Message $m)  use ($user) {
            $m->from( env('MAIL_FROM_ADDRESS'), config('app.name') );
            $m->to($user->email, $user->name)->subject('Registered New Account ' . config('app.name') );
        });
    }

}