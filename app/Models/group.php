<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;
    protected $table = 'tula_table10';

    public static function getListGroup()
    {
        $datas = group::all();
        $listDevices = convertDb::convertDataBase($datas,convertDb::$mapTable10);
        return $listDevices;
    }

    public static function getGroupNameByID($id)
    {
        $datas = group::select('tula1')->where('tula_Key', $id)->get();
        $nameGroup = convertDb::convertDataBase($datas,convertDb::$mapTable10);
        return $nameGroup[0]['nameGroup'];
    }

    public static function getGroupIDByName($name)
    {
        $datas = group::select('tula_Key')->where('tula1', $name)->get();
        $nameGroup = convertDb::convertDataBase($datas,convertDb::$mapTable10);
        return $nameGroup[0]['groupID'];
    }
}