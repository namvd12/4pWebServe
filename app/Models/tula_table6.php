<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tula_table1;
use App\Models\tula_table2;
use Illuminate\Support\Facades\DB;
class tula_table6 extends Model
{
    use HasFactory;

    protected $table = 'tula_table6';
    public $timestamps = false;

    public function listHistory($WhereData, $convert = true)
    {

        // search tula_key from $WhereData
        $datas = tula_table1::where('tula_Key', intval($WhereData))
                                 ->orwhere('tula1', "$WhereData")->get();

        $datas = convertDb::convertDataBase($datas, convertDb::$mapTable1, false);
        
        $tula_key = $datas[0]['tula_Key'];

        // search list data form tula_key
        
        $datas = tula_table6::select('tula2')
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
        $datas = tula_table2::whereIn('tula_Key',$listHistoryNG_ID)
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
            $dataInfor = tula_table1::select('tula1','tula3','tula4')->where('tula_Key',$History['tula21'])->get([]);       
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

        $datas = tula_table6::select("tula2")
                            ->WhereRaw("tula6 = 'NG' AND str_to_date(tula5,'%d-%m-%Y') BETWEEN \"$timeFrom\" AND \"$timeTo\"")
                            ->orderBy('tula_Key','DESC')
                            ->get();

        $listHistoryNG_ID = convertDb::convertDataBase($datas, convertDb::$mapTable6, false);      
        
        if(!count($listHistoryNG_ID))
        {  
            return null;
        }
        $datas = tula_table2::whereIn('tula_Key',$listHistoryNG_ID)
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
            $dataInfor = tula_table1::select('tula1','tula3','tula4')->where('tula_Key',$History['tula21'])->get([]);       
            $subDeviceInfor = convertDb::convertDataBase($dataInfor, convertDb::$mapTable1, false); 
            $listHistory[$key]['tula10'] = $subDeviceInfor[0]['tula1'];
            $listHistory[$key]['tula11'] = $subDeviceInfor[0]['tula3'];
            $listHistory[$key]['tula12'] = $subDeviceInfor[0]['tula4'];
        }
        return $listHistory;
    }
}