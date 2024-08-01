<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\machinePlan;
use App\Models\user;
use App\Mail\maintenancePlan;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
   public function view(){
        // get list machine warning
        $listMachine = machinePlan::getMachineWarning();
        if(count($listMachine) == 0)
        {
            return;
        }
        // sort line
        $lines = array();
        foreach ($listMachine as $key => $machine)
        {
            $lines[$key] = $machine['line'];
        }
        array_multisort($lines, SORT_ASC, $listMachine);

        // get list email to send notification
        $listEmail = user::findListEmail(["Team_leader","Part_leader"]);
        if($listEmail != null)
        {        
            foreach($listEmail as $email)
            {     
                $emailName = $email['email'];
                if($emailName != "")
                {
                    Mail::to($emailName)->send(new maintenancePlan($listMachine, $email['fullName']));
                }     
            }       
            return view('mail.maintenace',['listMachineWarning'=>$listMachine, 'name'=>"123"]);
        }
   }
}