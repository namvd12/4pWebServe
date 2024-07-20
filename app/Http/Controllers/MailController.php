<?php

namespace App\Http\Controllers;

use App\Mail\Signup;
use App\Mail\wellcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMail()
    {
        Mail::to('vudinhnambk01@gmail.com')->send(new wellcome());
        return 'welcome';
    }
}