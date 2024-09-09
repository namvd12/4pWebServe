<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class configSystem extends Model
{
    use HasFactory;
    protected $table = 'tula_table7';

    public $timestamps = false;

    public static function getConfigSystem($configKey = 1)
    {
        $datas = configSystem::where('tula_Key',$configKey)->get();
        $configs = convertDb::convertDataBase($datas,convertDb::$mapTable7);
        if(!count($configs))
        {
            return null;
        }
        return $configs[0];
    }

    public static function saveConfig($timeNG, $folder)
    {
        configSystem::where('tula_Key',1)->update(['tula2'=>$timeNG, 'tula3'=>$folder]);
    }
    public static function saveLineWorking($Line)
    {
        configSystem::where('tula_Key',1)->update(['tula4'=>$Line]);
    }
    public static function saveMode($mode)
    {
        configSystem::where('tula_Key',1)->update(['tula5'=>$mode]);
    }
}