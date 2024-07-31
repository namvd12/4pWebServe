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
    
    public function deviceNG($convert = true)
    {
        $datas = device::where('tula5',"NG")->get();

        $devices = convertDb::convertDataBase($datas,convertDb::$mapTable1, $convert);
        return $devices;
    }
    
    public function deviceAll($convert = true)
    {
        $datas = device::all();

        $devices = convertDb::convertDataBase($datas,convertDb::$mapTable1, $convert);
        return $devices;
    }

    public function findOneDevice($whereData, $convert = true)
    {       
        $datas = device::where('tula1','=',"$whereData")->orwhere('tula_key','=',intval($whereData))->get();
        $devices = convertDb::convertDataBase($datas,convertDb::$mapTable1, $convert);
        return $devices;
    }

    public function updateImage($whereData, $dataUpdate)
    {
        $status = device::where('tula1','=',"$whereData")->orwhere('tula_key','=',intval($whereData))->update(['tula7'=>"$dataUpdate"]);
        return $status;
    }
}