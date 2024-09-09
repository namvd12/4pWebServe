<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\convertDb;
class device extends Model
{
    use HasFactory;
    protected $table = 'tula_table1';

    public $timestamps = false;
    
    public static function deviceNG($convert = true)
    {
        $datas = device::where('tula5',"NG")->get();

        $devices = convertDb::convertDataBase($datas,convertDb::$mapTable1, $convert);
        return $devices;
    }
  
    public static function deviceAll($convert = true)
    {
        $datas = device::all();

        $devices = convertDb::convertDataBase($datas,convertDb::$mapTable1, $convert);
        return $devices;
    }

    public static function findOneDevice($whereData, $convert = true)
    {       
        $datas = device::where('tula1',"$whereData")
                        ->orwhere('tula_key','=',intval($whereData))
                        ->get();
        $devices = convertDb::convertDataBase($datas,convertDb::$mapTable1, $convert);
        return $devices;
    }

    public static function updateImage($whereData, $dataUpdate)
    {
        $status = device::where('tula1','=',"$whereData")->orwhere('tula_key','=',intval($whereData))->update(['tula7'=>"$dataUpdate"]);
        return $status;
    }

    public static function searchDevice($data,$convert = true)
    {
        $datas = device::where('tula1',"$data")
                        ->orwhere('tula2','Like',"%$data%")
                        ->orwhere('tula5','Like',"%$data%")
                        ->orwhere('tula10','Like',"%$data%")
                        ->orwhere('tula11','Like',"%$data%")
                        ->get();
        $devices = convertDb::convertDataBase($datas,convertDb::$mapTable1, $convert);
        return $devices;
    }

    public static function addNewDevice($machineCode, $machineName, $line, $lane, $Model, $Serial, $topBot)
    {
        $data = device::findOneDevice($machineCode);
        if(count($data))
        {
            return false;
        }
        device::insert([
            'tula1' => $machineCode,
            'tula2' => $machineName,
            'tula3' => $line,
            'tula4' => $lane,
            'tula10' => $Model,
            'tula11' => $Serial,
            'tula12' => $topBot,
        ]);
        return true;
    }

    public static function editDevice($machineCode, $machineName, $line, $lane, $Model, $Serial, $topBot)
    {
        $data = device::findOneDevice($machineCode);
        if(!count($data))
        {
            return false;
        }
        device::where('tula_key', $data[0]['deviceID'])->update([
            'tula2' => $machineName,
            'tula3' => $line,
            'tula4' => $lane,
            'tula10' => $Model,
            'tula11' => $Serial,
            'tula12' => $topBot,
        ]);
        return true;
    }

    public static function deleteMachineByCode($deviceCode)
    {
        device::where('tula1', $deviceCode)->delete();
    }

    public static function editCategoriOnDeviceByCode($deviceCode, $categoryID)
    {
        
        device::where('tula1', $deviceCode)->update([
            'tula13'=> $categoryID
        ]);
    }

    public static function getListdeviceByCategory($categoryID)
    {
        $datas = device::where('tula13', $categoryID)->get();
        $listDevices = convertDb::convertDataBase($datas,convertDb::$mapTable1);
        return $listDevices;
    }

    public static function getListdeviceByLine($line)
    {
        $datas = device::select('tula_Key')->where('tula3', $line)->get();
        $listDevices = convertDb::convertDataBase($datas,convertDb::$mapTable1);
        return $listDevices;
    }
    
    public static function deleteCatOnDevice($idCat)
    {
        device::where('tula13', $idCat)->update(['tula13' => ""]);
    }
}