<?php

namespace App\Http\Controllers\web\sparePart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\debug;
use App\Models\machinePlan;
use App\Models\device;
class maintenacePlanController extends Controller
{
    public function index(Request $request)
    {
        return $this->showCalendarOnMonth(strtotime(date('d-m-Y')));
    }

    public function showNextMonth(Request $request)
    {
        if($request->get('monthShowNow') != null)
        {
            $date = strtotime('+1 month', $request->get('monthShowNow'));
            return $this->showCalendarOnMonth($date);
        }
    }

    public function showLastMonth(Request $request)
    {
        if($request->get('monthShowNow') != null)
        {
            $date = strtotime('-1 month', $request->get('monthShowNow'));
            return $this->showCalendarOnMonth($date);
        }
    }

    private function showCalendarOnMonth($date)
    {
        $firtDayOfMonth = strtotime(date('01-m-Y',$date));

        $lastDaysOfMonth = strtotime(date('t-m-Y',$date));
        
        $arrayDayofWeek = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
        for($Day = $firtDayOfMonth; $Day <= $lastDaysOfMonth; $Day =  strtotime('+1 day', $Day))
        {

            $week = $this->weekOfMonth($Day);
            $dayOfWeek = date("D",$Day);
            $dayofMonth = date('d',$Day);
            $arrayDays[$week][$dayOfWeek] = $dayofMonth;     

            // arrayDeviceMaintenace
            for($numberLine = 0; $numberLine <= 8; $numberLine++)
            {
                $numberPlan= machinePlan::getTotalPlanbyLine($Day, $numberLine);
                $numberPlanOK = machinePlan::getTotalPlanOKbyLine($Day, $numberLine);

                $arrayPlan[$numberLine][$dayofMonth]['total'] = $numberPlan;
                $arrayPlan[$numberLine][$dayofMonth]['OK'] = $numberPlanOK;
            }
        }

        return view("sparePart.maintenacePlan",['arrayDayofWeek'=>$arrayDayofWeek,
                                                'arrayDays'=>$arrayDays,
                                                'arrayPlanLine0' => $arrayPlan[0],
                                                'arrayPlanLine1' => $arrayPlan[1],
                                                'arrayPlanLine2' => $arrayPlan[2],
                                                'arrayPlanLine3' => $arrayPlan[3],
                                                'arrayPlanLine4' => $arrayPlan[4],
                                                'arrayPlanLine5' => $arrayPlan[5],
                                                'arrayPlanLine6' => $arrayPlan[6],
                                                'arrayPlanLine7' => $arrayPlan[7],
                                                'arrayPlanLine8' => $arrayPlan[8],                                               
                                                'monthShowNow' => $firtDayOfMonth]);
    }

    private function weekOfMonth($date) {
        //Get the first day of the month.
        $firstOfMonth = strtotime(date("Y-m-01", $date));
        //Apply above formula.
        return $this->weekOfYear($date) - $this->weekOfYear($firstOfMonth) + 1;
    }

    private function weekOfYear($date) {
        $weekOfYear = intval(date("W", $date));
        if (date('n', $date) == "1" && $weekOfYear > 51) {
            // It's the last week of the previos year.
            return 0;
        }
        else if (date('n', $date) == "12" && $weekOfYear == 1) {
            // It's the first week of the next year.
            return 53;
        }
        else {
            // It's a "normal" week.
            return $weekOfYear;
        }
    }

    
    public function newMachinePlan(Request $request)
    {
        // get list device 
        $listDevice = device::deviceAll();
        return view('sparepart.newMachinePlan',['listDevice'=>$listDevice]);
    }

    public function getMachineInfor(Request $request)
    {
        if($request->get('machineID') != null)
        {
            $machineID = $request->get('machineID');
            $machineInfor = device::findOneDevice($machineID);
            return response()->json($machineInfor[0]);
        }
        return "Error";
    }
}