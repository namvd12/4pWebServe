<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\maintenancePlan;
use App\Models\machinePlan;
use App\Models\user;

class maintenancePlanEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email waring everyday';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
        if(env("APP_ENV","develop") == "product")
        {
            $listEmail = user::findListEmail(["Team_leader","Part_leader"]);
        }
        else
        {
            $listEmail = user::findListEmail(["Test"]);
        }
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
            $this->info('Emails sent sussessfully');
        }
    }
}