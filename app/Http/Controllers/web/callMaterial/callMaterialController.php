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
        if(isset($request['callID']))
        {
            $callID = $request['callID'];
        }
        $listCall = callMaterial::getAll();
        return view('callForSupplies.notification',['listCall' => $listCall,
                                                    'callID' => $callID]);
    }

    public function updateStatusCall(Request $request)
    {
        if($request->get('callID') != null  && $request->get('status') != null)
        {
            $callID = $request->get('callID');
            $status = $request->get('status');
            callMaterial::updateStatus($callID, $status);
            return "OK";
        }
        else
        {
            return "Error";
        }
    }
}