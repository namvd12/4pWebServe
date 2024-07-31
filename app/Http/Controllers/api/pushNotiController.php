<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class pushNotiController extends Controller
{
    public function push(Request $request)
    {
        $request = json_decode($request->getContent(), TRUE);

        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'\..\..\..\..\firebase_credentials.json');

        
        $messaging = $firebase->createMessaging();

        
        $message = array();
        
        $notification = [ 'title' => 'Device NG',
                          'body' => $request];
        
        $message []= CloudMessage::fromArray([
            'notification' => $notification,    
            'topic'=> 'Team_leader',  
        ]);
        $message []= CloudMessage::fromArray([
            'notification' => $notification,    
            'topic'=> 'Part_leader',  
        ]);
        $message []= CloudMessage::fromArray([
            'notification' => $notification,    
            'topic'=> 'Engineer',  
        ]);
        // $message []= CloudMessage::fromArray([
        //     'notification' => $notification,    
        //     'topic'=> 'Customer',  
        // ]);

        $messaging->sendall($message);

        return response()->json(['message' => "Push notification OK"]);
    }
}