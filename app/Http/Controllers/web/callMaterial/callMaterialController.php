<?php

namespace App\Http\Controllers\web\callMaterial;

use App\Http\Controllers\Controller;
use App\Models\callMaterial;
use Illuminate\Http\Request;

class callMaterialController extends Controller
{
    public function viewCallMaterial(Request $request)
    {
        $callID = null;
        $date = date('Y-m-d');
        // if(isset($request['callID']))
        // {
        //     $callID = $request['callID'];
        // }
        $listCall = callMaterial::getByDay($date);
        return view('callForSupplies.notification',['listCall' => $listCall,
                                                    'callID' => $callID]);
    }
    public function viewCallMaterialDay(Request $request)
    {
        if($request->get('daySearch') != null)
        {
            $callID = null;
            $date = $request->get('daySearch');
            
            if($request->get('callID') != null)
            {
                $callID = $request['callID'];
            }
            $listCall = callMaterial::getByDay($date);
            return view('callForSupplies.listNotification',['listCall' => $listCall,
            'callID' => $callID]);
        }
        else
        {
            return "error";
        }
    }

    public function updateStatusCall(Request $request)
    {
        if($request->get('callID') != null  && $request->get('status') != null)
        {
            $callID = $request->get('callID');
            $status = $request->get('status');
            $note = $request->get('note');
            callMaterial::updateStatus($callID, $status, $note);
            return "OK";
        }
        else
        {
            return "Error";
        }
    }

    public function updateStatusOkAll(Request $request)
    {
        callMaterial::updateStatusOKAll();
        return "OK";
    }
}