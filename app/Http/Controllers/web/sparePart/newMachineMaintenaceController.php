<?php

namespace App\Http\Controllers\web\sparepart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\machinePlan;
use App\Models\device;
class newMachineMaintenaceController extends Controller
{
    public function newMachinePlan(Request $request)
    {
        if($request->get('code') != null && $request->get('item') != null && $request->get('cycle') != null && 
           $request->get('timeStart') != null && $request->get('timeEnd') != null)
        {
            $code = $request->get('code');
            $item = $request->get('item');
            $status = "WAITING";
            $cycle = $request->get('cycle');
            $timeStart = $request->get('timeStart');
            $timeEnd = $request->get('timeEnd');
            $note = $request->get('note');
            $machineInfor = device::findOneDevice($code);
            machinePlan::addNewMachinePlan($machineInfor[0]['deviceID'], $cycle, $timeStart, $timeEnd, $cycle, $item, $status, $note);
            return redirect()->route('maintenacePlan');
        }
    }
}