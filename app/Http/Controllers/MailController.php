<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Mailer;
class MailController extends Controller
{
    public function sendTest()
    {
        $to = collect([
            'Receiver' => 'terry60103@gmail.com',
        ]);

        $params = [
            "message" => "測試訊息",
        ];
        
        Mail::to($to)->send(new Mailer("主旨", "mails.template" , $params));
    }
}