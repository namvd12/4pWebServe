<?php

namespace App\Http\Controllers\api\notiCallMaterial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NotificationSent;

class notiMaterialController extends Controller
{
    public function sendCallMaterial(Request $request)
    {
        $requestDatas = json_decode($request->getContent(), TRUE);  // decode request
        $datas =  json_decode($requestDatas, TRUE);   // decode content
        if(isset($datas['callID']) && isset($datas['machineCode']) && isset($datas['partNumber']))
        {
            $callID = $datas['callID'];
            $user = $datas['user'];
            $machineCode = $datas['machineCode']; 
            $partNumber = $datas['partNumber']; 
            $message = $callID.";".$user.";".$machineCode.";".$partNumber;
            event(new NotificationSent($message));   
            return 'true';
        }
        else
        {
            $machineCode = $datas['machineCode']; 
            $partNumber = $datas['partNumber']; 
            return $machineCode;
        }
    }
}