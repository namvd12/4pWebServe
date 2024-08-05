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
        $requestDatas = json_decode($request->getContent());  // decode request

        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'\..\..\..\..\firebase_credentials.json');
            
        $messageBody = "";
        $datas =  json_decode($requestDatas, TRUE);   // decode content

        $countDeviceNG = count($datas);
        $title = "$countDeviceNG Device NG";
        foreach( $datas as $data)
        {
            if(isset($data["deviceCode"]) && isset($data["deviceName"]) && isset($data["line"]) && isset($data["lane"])) 
            {
                $deviceCode = $data["deviceCode"];
                $deviceName = $data["deviceName"];
                $line       = $data["line"];
                $lane       = $data["lane"]; 
                $messageBody .= "$line-$lane [$deviceCode]  $deviceName \r\n";               
            }
        }
       
        $messaging = $firebase->createMessaging();
       
        $message = array();
        
        $notification = [ 'title' => $title,
                          'body' => $messageBody];
        if(env("APP_ENV","develop") == "product")
        {
            $message []= CloudMessage::fromArray([
                'notification' => $notification,    
                'topic'=> 'Team_leader', 
                "android"=> [
                    "priority"=> "high"
                ],
                "priority" => 10, 
                'apns'=> [
                    'payload'=> [
                        'aps'=> [
                            'sound'=> 'default'
                        ],
                    ],
                ],
            ]);
            $message []= CloudMessage::fromArray([
                'notification' => $notification,    
                'topic'=> 'Part_leader',  
                "android"=> [
                    "priority"=> "high"
                ],
                "priority" => 10,
                'apns'=> [
                    'payload'=> [
                        'aps'=> [
                            'sound'=> 'default'
                        ],
                    ],
                ],
            ]);
            $message []= CloudMessage::fromArray([
                'notification' => $notification,    
                'topic'=> 'Engineer',  
                "android"=> [
                    "priority"=> "high"
                ],
                "priority" => 10,
                'apns'=> [
                    'payload'=> [
                        'aps'=> [
                            'sound'=> 'default'
                        ],
                    ],
                ],
            ]);
        }
        else
        {
            $message []= CloudMessage::fromArray([
                'notification' => $notification,    
                'topic'=> 'Test', 
                "android"=> [
                    "priority"=> "high",
                ],
                "priority" => 10,
                'apns'=> [
                    'payload'=> [
                        'aps'=> [
                            'sound'=> 'default'
                        ],
                    ],
                ],
            ]);

        }
        $messaging->sendall($message);

        return response()->json(['message' => "Push notification OK"]);
    }
}