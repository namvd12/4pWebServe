<?php

namespace App\Http\Controllers\web\notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NotificationSent;
class notiController extends Controller
{
    public function view()
    {
        return view('callForSupplies.notification');
    }
    public function sendNotification()
    {
        $message = '43;ABC;XYZ';
        event(new NotificationSent($message));
    }
}