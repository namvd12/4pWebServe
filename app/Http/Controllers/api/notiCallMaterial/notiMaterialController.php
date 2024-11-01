<?php

namespace App\Http\Controllers\api\notiCallMaterial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NotificationSent;
use App\Models\user;

class notiMaterialController extends Controller
{
    public function sendCallMaterial(Request $request)
    {
        $requestDatas = json_decode($request->getContent(), TRUE);  // decode request
        $datas =  json_decode($requestDatas, TRUE);   // decode content
        if(isset($datas['callID']) && isset($datas['machineCode']) && isset($datas['line']) && isset($datas['lane']) 
            && isset($datas['userID']) && isset($datas['slot']))
        {
            $callID = $datas['callID'];
            $userKey = $datas['userID'];
            $machineCode = $datas['machineCode']; 
            $line = $datas['line']; 
            $land = $datas['lane']; 
            $slot = $datas['slot']; 
            $time = $datas['time']; 

            $userInfor = user::getUserinforByKey($userKey);
            $userName = "Unknow";
            if($userInfor != null)
            {
                $userName = $userInfor['userName'];
            }

            $message = $callID.";".$userName.";".$machineCode.";".$line.";".$land.";".$slot.";".$time;
            event(new NotificationSent($message));   
            return 'OK';
        }
        else
        {
            $machineCode = $datas['machineCode']; 
            return $machineCode;
        }
    }
}