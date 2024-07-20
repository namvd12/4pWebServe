<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
class PushNotificationController extends Controller
{
    public function sendPushNotification()
    {
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'\..\..\..\firebase_credentials.json');

        $messaging = $firebase->createMessaging();

        $message = CloudMessage::fromArray([
            'notification' => [
                'title' => 'Hello from Firebase!',
                'body' => 'hello.'
            ],           
            'token' => 'dmUKTM5OScmPtQ8MyadXGj:APA91bFxBrwNLnVYYEXlOe0SRae-oRwnGJSb7710jLQhZpXd6S_yDSQomQT4QOr8XwSpB7TEpBbu0MyDjnWZDrz4oa_cTL7yXcGqA63jLbQPSUkgfig_vT86k1BIErHuHhuMUUXjwsZA'
        ]);

        $messaging->send($message);

        return response()->json(['message' => 'Push notification sent successfully']);
    }
}