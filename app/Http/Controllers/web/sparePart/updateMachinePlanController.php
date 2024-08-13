<?php

namespace App\Http\Controllers\web\sparePart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\machinePlan;
use App\Models\device;
class updateMachinePlanController extends Controller
{
    public function updateView(Request $request)
    {
        if($request->get('maintenanceID') !=null)
        {
            $maintenceID = $request->get('maintenanceID');
            $maintenceData = machinePlan::getMachineMaintenaceByID($maintenceID);
            if($maintenceData != null)
            {
                return view('sparePart.updateMachinePlan',['maintenceData' => $maintenceData]);
            }
        }
    }

    public function save(Request $request)
    {
        if($request->get('maintenanceID') != null && $request->get('item') != null && $request->get('cycle') != null && 
        $request->get('timeStart') != null && $request->get('timeEnd') != null)
        {
            $maintenanceID = $request->get('maintenanceID');
            $item = $request->get('item');
            $cycle = $request->get('cycle');
            $timeStart = $request->get('timeStart');
            $timeEnd = $request->get('timeEnd');
            $note = $request->get('note');
            machinePlan::editMachinePlan($maintenanceID, $cycle, $timeStart, $timeEnd, $cycle, $item, $note);
            return redirect()->route('listMachinePlan',['day'=>strtotime($timeEnd)]);
        }
    }

    public function newMachinePlan(Request $request)
    {
        $res = "Error";
        /*update current status */
        if($request->get('statusUpdate') != null && $request->get('maintenaceID') != null)
        {
            $status = $request->get('statusUpdate');
            $maintenanceID = $request->get('maintenaceID');
            machinePlan::editMachinePlanStatus($maintenanceID, $status);
            $res = "OK";
        }

        /*create new maintenace plan */
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
            $res = "OK";
        }

        return $res;
    }

    public function deleteMachinePlan(Request $request)
    {
        if($request->get('maintenaceID') != null && $request->get('day') != null)
        { 
            $maintenanceID = $request->get('maintenaceID'); 
            $timeEnd = $request->get('day');
            machinePlan::deleteMachinePlanByID($maintenanceID);
            return 'OK';
            //return redirect()->route('listMachinePlan',['day'=>strtotime($timeEnd)]);
        }
        else
        {
            return 'Error';
        }
    }
}