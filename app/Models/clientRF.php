<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientRF extends Model
{
    use HasFactory;

    protected $table = 'tula_table3';
    public $timestamps = false;

    public static function getAllRfClient()
    {
        $datas = clientRF::orderby('tula3','ASC')->get();
        $listRF = convertDb::convertDataBase($datas, convertDb::$mapTable3, true); 
        return $listRF;
    }
    
    public static function getRFinforByID($ID)
    {
        $datas = clientRF::where('tula_key',$ID)->get();
        $RFInfor = convertDb::convertDataBase($datas, convertDb::$mapTable3, true); 
        if(!count($RFInfor))
        {
            return null;
        }
        return $RFInfor;
    }

    public static function getRFinforByDeviceCode($deviceCode)
    {
        $datas = clientRF::where('tula2',$deviceCode)->get();
        $RFInfor = convertDb::convertDataBase($datas, convertDb::$mapTable3, true); 
        if(!count($RFInfor))
        {
            return null;
        }
        return $RFInfor;
    }
    
    public static function getRFinforByAddrPort($addr, $port)
    {
        $datas = clientRF::where('tula3',$addr)
                          ->where('tula4',$port)
                          ->get();
        $RFInfor = convertDb::convertDataBase($datas, convertDb::$mapTable3, true); 
        if(!count($RFInfor))
        {
            return null;
        }
        return $RFInfor;
    }
    public static function getRegionInfor($region)
    {
        $datas = clientRF::where('tula2',$region)
                          ->get();
        $RFInfor = convertDb::convertDataBase($datas, convertDb::$mapTable3, true); 
        if(!count($RFInfor))
        {
            return null;
        }
        return $RFInfor;
    }

    public static function getListRegion()
    {
        $datas = clientRF::select('tula2')
                          ->where('tula2','Like', "%Region%")->get();
        $listRegion = convertDb::convertDataBase($datas, convertDb::$mapTable3, true); 
        if(!count($listRegion))
        {
            return null;
        }
        return $listRegion;
    }

    public static function editRF($rf_id, $device_id, $device_code, $client_addr, $client_port, $region_name, $numberDevice)
    {
        $dataUpdate = array();
        if($device_id != '')
        {
            $dataUpdate['tula1'] = $device_id;
        }
        if($device_code != '')
        {
            $dataUpdate['tula2'] = $device_code;
        }
        if($client_addr != '')
        {
            $dataUpdate['tula3'] = $client_addr;
        }
        if($client_port != '')
        {
            $dataUpdate['tula4'] = $client_port;
        }
        if($region_name != '')
        {
            $dataUpdate['tula8'] = $region_name;
        }
        if($numberDevice != '')
        {
            $dataUpdate['tula9'] = $numberDevice;
        }
        clientRF::where('tula_key',$rf_id)->update( $dataUpdate);
      
        return true;
    }

    public static function saveEditRF($rf_id, $device_id, $device_code, $client_addr, $client_port, $region_name, $numberDevice)
    {
        $dataUpdate = array();
        if($device_id != '')
        {
            $dataUpdate['tula1'] = $device_id;
        }
        if($device_code != '')
        {
            $dataUpdate['tula2'] = $device_code;
        }
        if($client_addr != '')
        {
            $dataUpdate['tula3'] = $client_addr;
        }
        if($client_port != '')
        {
            $dataUpdate['tula4'] = $client_port;
        }
        if($region_name != '')
        {
            $dataUpdate['tula8'] = $region_name;
        }
        if($numberDevice != '')
        {
            $dataUpdate['tula9'] = $numberDevice;
        }
        clientRF::where('tula_key',$rf_id)->update( $dataUpdate);
        return true;
    }

    public static function addNew($client_addr, $client_port, $device_code, $region, $numberDevice)
    {
        $data = clientRF::getRFinforByAddrPort($client_addr, $client_port);
        print_r($data);
        if(($data != null))
        {
            return false;
        }
        $deviceInfor = device::searchDevice($device_code);
        clientRF::insert([
            'tula1' => $deviceInfor[0]['deviceID'],
            'tula2' => $device_code,
            'tula3' => $client_addr,
            'tula4' => $client_port,
            'tula5' => "OK",
            'tula6' => "0",
            'tula7' => "0",
            'tula8' => $region,
            'tula9' => $numberDevice,
        ]);
        return true;
    }

    public static function addNewRegion($line, $region_add)
    {
        $deviceInfor = device::getListdeviceByLine($line);
        if((count($deviceInfor) == 0))
        {
            return false;
        }
        $regionInfor = clientRF::getRegionInfor($region_add);
        if($regionInfor != null)
        {
            return false;
        }

        clientRF::insert([
            'tula1' => $deviceInfor[0]['deviceID'],
            'tula2' => $region_add,
            'tula3' => "0",
            'tula4' => "0",
            'tula5' => "OK",
            'tula6' => "0",
            'tula7' => "0",
        ]);
        return true;
    }
    
    public static function deleteByID($ID)
    {
        clientRF::where('tula_Key', $ID)->delete();
    }
}