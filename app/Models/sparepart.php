<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\convertDb;
use DateTime;
class sparepart extends Model
{
    use HasFactory;
    protected $table = 'tula_table5';
    public $timestamps = false;
    public static function getAll()
    {
        $datas = sparepart::all();
        $listSparepart = convertDb::convertDataBase($datas, convertDb::$mapTable5); 
        foreach($listSparepart as $key =>$value)
        {
            $deviceInfor = device::findOneDevice($value['deviceID']);

            $listSparepart[$key] = array_merge($listSparepart[$key], $deviceInfor[0]);

            // caculate time remaining
            $timeMaintenaceConvert = str_replace('/','-', $listSparepart[$key]['timeMaintenace']);

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

            $listSparepart[$key]['timeRemaining'] =  $timeRemaining;
        }
        return $listSparepart;
    }

    public static function getSparePartByID($sparePartID)
    {
        $datas = sparepart::where('tula_Key', $sparePartID)->get();
        $listSparepart = convertDb::convertDataBase($datas, convertDb::$mapTable5); 
        foreach($listSparepart as $key =>$value)
        {
            $deviceInfor = device::findOneDevice($value['deviceID']);

            $listSparepart[$key] = array_merge($listSparepart[$key], $deviceInfor[0]);

            // caculate time remaining
            $timeMaintenaceConvert = str_replace('/','-', $listSparepart[$key]['timeMaintenace']);

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
            $listSparepart[$key]['timeMaintenace'] = Date("Y-m-d", strtotime($timeMaintenaceConvert));
            $listSparepart[$key]['timeRemaining'] =  $timeRemaining;
        }
        return $listSparepart;
    }

    public static function saveSparePart($deviceID, $spareCode, $spareName, $serialNumber, $timeMaintenace, $numberItem, $cycles)
    {
        sparepart::insert([
            'tula1' => $deviceID,
            'tula2' => $spareCode,
            'tula3' => $spareName,
            'tula4' => $serialNumber,
            'tula5' => $timeMaintenace,
            'tula6' => $numberItem,
            'tula7' => $cycles,
        ]);
    }
    public static function saveEditSparePart($sparePartID, $deviceID, $spareCode, $spareName, $serialNumber, $timeMaintenace, $numberItem, $cycles)
    {
            sparepart::where('tula_key',$sparePartID)->update([
                'tula1' => $deviceID,
                'tula2' => $spareCode,
                'tula3' => $spareName,
                'tula4' => $serialNumber,
                'tula5' => $timeMaintenace,
                'tula6' => $numberItem,
                'tula7' => $cycles,
            ]);
    }

    public static function updateSparePart($sparePartID, $cycle, $replacementDate)
    {
        sparepart::where('tula_Key', $sparePartID)->update([
            'tula5' => $replacementDate, 
            'tula7' => $cycle,
        ]);
    }

    public static function deleteSparePartByID($sparePartID)
    {
        sparepart::where('tula_Key', $sparePartID)->delete();
    }
}