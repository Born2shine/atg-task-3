<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\mail\SendMail;

class SendEmailController extends Controller
{
    public function send(){

        // Mail::send(['text' => 'mail'],['name' => 'Thomas'], function($message){
        //     $message->to('odohfriday9@gmail.com', '
        //     To Thomas')->subject('Data Submitted');
        //     $message->from('odohfriday9@gmail.com', 'Thomas');
        // });

        Mail::send(new SendMail());
        

    }
}
