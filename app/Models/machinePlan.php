<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\convertDb;
use App\Models\device;
use DateTime;

class machinePlan extends Model
{
    use HasFactory;

    protected $table = 'tula_table4';

    public $timestamps = false;

    public static function getMachineWarning()
    {
        $datas = machinePlan::WhereRaw("str_to_date(tula4,'%d/%m/%Y') BETWEEN str_to_date(tula3,'%d/%m/%Y') AND DATE_ADD(NOW(), INTERVAL 4 DAY)")
        ->orderBy('tula_Key','DESC')
        ->get();
        $listMachinePlan = convertDb::convertDataBase($datas, convertDb::$mapTable4); 
        foreach($listMachinePlan as $key=>$machinePlan)
        {
            $datas = device::select(['tula2','tula3'])->where('tula_Key',$machinePlan['deviceID'])->get();
            $machineInfor = convertDb::convertDataBase($datas, convertDb::$mapTable1);
            $machineInfor = $machineInfor[0];

            // add machineInfor
            $listMachinePlan[$key]+=$machineInfor;

            // caculate time remaining
            $timeLatesConvert = str_replace('/','-', $machinePlan['timeLates']);
            $timeMaintenaceConvert = str_replace('/','-', $machinePlan['timeMaintenace']);

            $date = new DateTime("$timeMaintenaceConvert");
            $now = new DateTime();
  
            if($now > $date)
            {
                $intervel = 0;
            }
            else
            {
                $intervel = $date->diff($now)->days;
            }
               
            $timeRemaining = $intervel;           
            // format to display
            $listMachinePlan[$key]['timeLates'] = Date("Y-m-d", strtotime("$timeLatesConvert"));

            $listMachinePlan[$key]['timeMaintenace'] = Date("Y-m-d", strtotime("$timeMaintenaceConvert"));
            
            $listMachinePlan[$key]['timeRemaining'] = $timeRemaining;
        }
        return $listMachinePlan;
    }
}