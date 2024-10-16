<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\device;
use App\Models\deviceStatus;
use Illuminate\Support\Facades\DB;
class deviceReport extends Model
{
    use HasFactory;

    protected $table = 'tula_table6';
    public $timestamps = false;

    public function listHistory($WhereData, $convert = true)
    {

        // search tula_key from $WhereData
        $datas = device::where('tula_Key', intval($WhereData))
                                 ->orwhere('tula1', "$WhereData")->get();

        $datas = convertDb::convertDataBase($datas, convertDb::$mapTable1, false);
        
        $tula_key = $datas[0]['tula_Key'];

        // search list data form tula_key
        
        $datas = deviceReport::select('tula2')
                            ->where('tula1',$tula_key)
                            ->where(function($query){
                                $query->where('tula6','OK')
                                    ->orwhere('tula6','NG');})
                            ->orderBy('tula_Key','DESC')
                            ->limit(100)->get();
        $listHistoryNG_ID = convertDb::convertDataBase($datas, convertDb::$mapTable6, false);      
        
        if(!count($listHistoryNG_ID))
        {
            return null;
        }
        $datas = deviceStatus::whereIn('tula_Key',$listHistoryNG_ID)
                            ->orderBy('tula_Key','DESC')
                            ->get();
        $listHistory = convertDb::convertDataBase($datas, convertDb::$mapTable6, false);      
        foreach($listHistory as $key=>$History)
        {
            // check image
            $isImage = "false";
            if(file_exists($History["tula9"]) || file_exists($History["tula11"]) || file_exists($History["tula13"]) || file_exists($History["tula15"])  ||  file_exists($History["tula17"]) ||  file_exists($History["tula19"]))
            {
                $isImage = "true";
            }
            $listHistory[$key]['tula9'] = $isImage;
            if($History['tula21'] == null)
            {
                $History['tula21'] =  $History['tula1'];
            }
            // search sub device information
            $dataInfor = device::select('tula1','tula3','tula4')->where('tula_Key',$History['tula21'])->get([]);       
            $subDeviceInfor = convertDb::convertDataBase($dataInfor, convertDb::$mapTable1, false); 
            $listHistory[$key]['tula10'] = $subDeviceInfor[0]['tula1'];
            $listHistory[$key]['tula11'] = $subDeviceInfor[0]['tula3'];
            $listHistory[$key]['tula12'] = $subDeviceInfor[0]['tula4'];
        }
        return $listHistory;
    }

    public function listHistoryAllDevice($timeFrom, $timeTo)
    {
        // search list data form tula_key

        $datas = deviceReport::select("tula2")
                            ->WhereRaw("tula6 = 'NG' AND str_to_date(tula5,'%d-%m-%Y') BETWEEN \"$timeFrom\" AND \"$timeTo\"")
                            ->orderBy('tula_Key','DESC')
                            ->get();

        $listHistoryNG_ID = convertDb::convertDataBase($datas, convertDb::$mapTable6, false);      
        
        if(!count($listHistoryNG_ID))
        {  
            return null;
        }
        $datas = deviceStatus::whereIn('tula_Key',$listHistoryNG_ID)
                            ->orderBy('tula_Key','DESC')
                            ->get();
        $listHistory = convertDb::convertDataBase($datas, convertDb::$mapTable2, false);      
        foreach($listHistory as $key=>$History)
        {
            // check image
            $isImage = "false";
            if(file_exists($History["tula9"]) || file_exists($History["tula11"]) || file_exists($History["tula13"]) || file_exists($History["tula15"])  ||  file_exists($History["tula17"]) ||  file_exists($History["tula19"]))
            {
                $isImage = "true";
            }
            $listHistory[$key]['tula9'] = $isImage;
            if($History['tula21'] == null)
            {
                $History['tula21'] =  $History['tula1'];
            }
            // search sub device information
            $dataInfor = device::select('tula1','tula3','tula4')->where('tula_Key',$History['tula21'])->get([]);       
            $subDeviceInfor = convertDb::convertDataBase($dataInfor, convertDb::$mapTable1, false); 
            $listHistory[$key]['tula10'] = $subDeviceInfor[0]['tula1'];
            $listHistory[$key]['tula11'] = $subDeviceInfor[0]['tula3'];
            $listHistory[$key]['tula12'] = $subDeviceInfor[0]['tula4'];
        }
        return $listHistory;
    }

    public static function listHistoryReportSearch($dataSearch, $timeFrom, $timeTo, $line = null)
    {
        // search list data form tula_key
        if($line == null)
        {
            $datas = deviceReport::select("tula2")
                                ->where("tula6","NG")
                                ->whereIn("tula7",['run',''])
                                ->WhereRaw("str_to_date(tula5,'%d-%m-%Y') BETWEEN \"$timeFrom\" AND \"$timeTo\"")
                                ->orderBy('tula_Key','DESC')
                                ->get();
        }
        else
        {
            $datas = deviceReport::select("tula2")
            ->where("tula6","NG")
            ->WhereRaw("str_to_date(tula5,'%d-%m-%Y') BETWEEN \"$timeFrom\" AND \"$timeTo\"")
            ->Where("tula3","$line")
            ->orderBy('tula_Key','DESC')
            ->get();
        }

        $listHistoryNG_ID = convertDb::convertDataBase($datas, convertDb::$mapTable6, false);      
        
        if(!count($listHistoryNG_ID))
        {  
            return null;
        }

        $deviceInfor = device::findOneDevice($dataSearch);
        if(count($deviceInfor))
        {
            $datas = deviceStatus::whereIn('tula_Key',$listHistoryNG_ID)
                                ->where('tula8','Like',$dataSearch)
                                ->orwhere('tula1',$deviceInfor[0]['deviceID'])
                                ->orderBy('tula_Key','DESC')
                                ->get();
        }
        else
        {
            $datas = deviceStatus::whereIn('tula_Key',$listHistoryNG_ID)
            ->where('tula8','Like',$dataSearch)
            ->orderBy('tula_Key','DESC')
            ->get();
        }
        $listHistory = convertDb::convertDataBase($datas, convertDb::$mapTable2, true);      
        foreach($listHistory as $key=>$History)
        {
            if($History['subID'] == null)
            {
                $History['subID'] =  $History['deviceKey'];
            }
            // search sub device information
            $dataInfor = device::where('tula_Key',$History['subID'])->get();       
            $subDeviceInfor = convertDb::convertDataBase($dataInfor, convertDb::$mapTable1, true); 
            $listHistory[$key]['deviceName'] = $subDeviceInfor[0]['deviceName'];
            $listHistory[$key]['line'] = $subDeviceInfor[0]['line'];
            $listHistory[$key]['lane'] = $subDeviceInfor[0]['lane'];
            $listHistory[$key]['topBot'] = $subDeviceInfor[0]['topBot'];

            // search status OK near NG
            $datas =  deviceStatus::where('tula_Key','>',$listHistory[$key]['historyID'])
                        ->where('tula1',$listHistory[$key]['deviceKey'])
                        ->where('tula8',"OK")
                        ->limit(1)
                        ->get();
            $listHistoryOK_NearNG = convertDb::convertDataBase($datas, convertDb::$mapTable2, true);     
            if(!count($listHistoryOK_NearNG))
            {
                $listHistory[$key]['timeOK'] = "";
                $listHistory[$key]['statusOK'] = "Waiting";
            }
            else
            {
                $listHistory[$key]['timeOK'] =  $listHistoryOK_NearNG[0]['time'];
                $listHistory[$key]['statusOK'] = "OK";
            }
        }
        return $listHistory;
    }

    public static function historyByID($id)
    {
        $datas = deviceStatus::where('tula_Key', $id)->get();
        $History = convertDb::convertDataBase($datas, convertDb::$mapTable2, true); 
        if(!count($History))
        {
            return null;
        }
        // find device infor
        $History = $History[0];
        if($History['subID'] != null)
        {
            $deviceInfor = device::findOneDevice($History['subID']);
        }
        else
        {
            $deviceInfor = device::findOneDevice($History['deviceKey']);
        }
        
        return array_merge($History, $deviceInfor[0]);
    }
}