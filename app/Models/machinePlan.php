<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\convertDb;
use App\Models\device;
use DateTime;

use function Symfony\Component\VarDumper\Dumper\esc;

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

    public static function getMachineMaintenaceOnDay($daySearch)
    {
        $daySearch = date('Y-m-d',$daySearch);
        $datas = machinePlan::WhereRaw("str_to_date(tula4,'%d/%m/%Y') BETWEEN \"$daySearch\" AND \"$daySearch\"")
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
                $intervel = $date->diff($now)->days + 1;
            }
               
            $timeRemaining = $intervel;           
            // format to display
            $listMachinePlan[$key]['timeLates'] = Date("Y-m-d", strtotime("$timeLatesConvert"));

            $listMachinePlan[$key]['timeMaintenace'] = Date("Y-m-d", strtotime("$timeMaintenaceConvert"));
            
            $listMachinePlan[$key]['timeRemaining'] = $timeRemaining;
        }
        return $listMachinePlan;
    }

    public static function getNumberMachineMaintenaceOnDay($daySearch)
    {
        $daySearch = date('Y-m-d',$daySearch);
        $datas = machinePlan::WhereRaw("str_to_date(tula4,'%d/%m/%Y') BETWEEN \"$daySearch\" AND \"$daySearch\"")
        ->orderBy('tula_Key','DESC')
        ->get();
        $listMachinePlan = convertDb::convertDataBase($datas, convertDb::$mapTable4); 
        return count($listMachinePlan);
    }
  
    public static function getNumberMachineWaitingOnDay($daySearch)
    {
        $daySearch = date('Y-m-d',$daySearch);
        $datas = machinePlan::WhereRaw("tula7 = 'waiting' AND str_to_date(tula4,'%d/%m/%Y') BETWEEN \"$daySearch\" AND \"$daySearch\"")
        ->orderBy('tula_Key','DESC')
        ->get();
        $listMachinePlan = convertDb::convertDataBase($datas, convertDb::$mapTable4); 
        return count($listMachinePlan);
    }

    public static function getNumberMachineOKOnDay($daySearch)
    {
        $daySearch = date('Y-m-d',$daySearch);
        $datas = machinePlan::WhereRaw("tula7 = 'OK' AND str_to_date(tula4,'%d/%m/%Y') BETWEEN \"$daySearch\" AND \"$daySearch\"")
        ->orderBy('tula_Key','DESC')
        ->get();
        $listMachinePlan = convertDb::convertDataBase($datas, convertDb::$mapTable4); 
        return count($listMachinePlan);
    }

    public static function addNewMachinePlan($machineID, $cycle, $timeStart, $timeEnd, $timeRemaining, $item, $status, $note)
    {
        // convert date time
        $timeStart = date('d/m/Y', strtotime($timeStart));
        $timeEnd = date('d/m/Y', strtotime($timeEnd));
        // dd($timeEnd);
        machinePlan::insert([
            'tula1' => $machineID,
            'tula2' => $cycle,
            'tula3' => $timeStart,
            'tula4' => $timeEnd,
            'tula5' => $timeRemaining,
            'tula6' => $item,
            'tula7' => $status,
            'tula8' => $note,
        ]);
    }

    public static function editMachinePlan($maintenanceID, $cycle, $timeStart, $timeEnd, $timeRemaining, $item, $note)
    {
        // convert date time
        $timeStart = date('d/m/Y', strtotime($timeStart));
        $timeEnd = date('d/m/Y', strtotime($timeEnd));
        // dd($timeEnd);
        machinePlan::where('tula_key', $maintenanceID)->update([
            'tula2' => $cycle,
            'tula3' => $timeStart,
            'tula4' => $timeEnd,
            'tula5' => $timeRemaining,
            'tula6' => $item,
            'tula8' => $note,
        ]);
    }

    public static function editMachinePlanStatus($maintenanceID, $status)
    {
        // dd($timeEnd);
        machinePlan::where('tula_key', $maintenanceID)->update([
            'tula7' => $status,
        ]);
    }

    public static function getMachineMaintenaceByID($id)
    {
        $datas = machinePlan::where('tula_Key',$id)->get();
        $MachinePlan = convertDb::convertDataBase($datas, convertDb::$mapTable4); 
        if(count($MachinePlan) == 1)
        {
            $MachinePlan = $MachinePlan[0];
            $datas = device::select(['tula1','tula2','tula3'])->where('tula_Key', $MachinePlan['deviceID'])->get();
            $machineInfor = convertDb::convertDataBase($datas, convertDb::$mapTable1);
            $machineInfor = $machineInfor[0];
            //dd($machineInfor);
            // add machineInfor
            $MachinePlan +=$machineInfor;

            // caculate time remaining
            $timeLatesConvert = str_replace('/','-', $MachinePlan['timeLates']);
            $timeMaintenaceConvert = str_replace('/','-', $MachinePlan['timeMaintenace']);

            $date = new DateTime("$timeMaintenaceConvert");
            $now = new DateTime();
  
            if($now > $date)
            {
                $intervel = 0;
            }
            else
            {
                $intervel = $date->diff($now)->days + 1;
            }
               
            $timeRemaining = $intervel;           
            // format to display
            $MachinePlan['timeLates'] = Date("Y-m-d", strtotime("$timeLatesConvert"));

            $MachinePlan['timeMaintenace'] = Date("Y-m-d", strtotime("$timeMaintenaceConvert"));
            
            $MachinePlan['timeRemaining'] = $timeRemaining;
            
            return $MachinePlan;
        }
        else
        {
            return null;
        }
    }

    public static function deleteMachinePlanByID($id)
    {
        machinePlan::where('tula_key', $id)->delete();
    }
}