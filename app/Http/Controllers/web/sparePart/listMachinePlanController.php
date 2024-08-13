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
        if($request->get('day') !=null)
        {
            $daySearch = $request->get('day');
            $listMachinePlan = machinePlan::getMachineMaintenaceOnDay($daySearch);
            return view('sparepart.listMachinePlan',['listMachinePlan'=>$listMachinePlan]);
        }
    }  

    public function updateAction(Request $request)
    {
        
    }
}