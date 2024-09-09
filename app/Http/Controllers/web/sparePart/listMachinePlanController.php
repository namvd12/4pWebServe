<?php

namespace App\Http\Controllers\web\sparepart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\machinePlan;
use App\Models\device;
class listMachinePlanController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('day') !=null && $request->get('line') !=null)
        {
            $daySearch = $request->get('day');
            $line = $request->get('line');
            $listMachinePlan = machinePlan::getMachineMaintenaceOnDay($daySearch, $line);
            
            return view('sparepart.listMachinePlan',['listMachinePlan'=>$listMachinePlan]);
        }
    }  

    public function updateAction(Request $request)
    {
        
    }
}