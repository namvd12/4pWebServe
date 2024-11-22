<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class callMaterial extends Model
{
    use HasFactory;
    protected $table = 'tula_table14';
    public $timestamps = false;
    
    public static function getAll()
    {
        $datas = callMaterial::all();
        $listCallMaterial = convertDb::convertDataBase($datas, convertDb::$mapTable14, true); 
        return $listCallMaterial;
    }

    public static function getByDay($date)
    {
        $datas = callMaterial::WhereRaw("str_to_date(tula8,'%d-%m-%Y') BETWEEN \"$date\" AND \"$date\"")
        ->orderby('tula7','DESC')                    
        ->orderby('tula6','ASC')                    
        ->orderby('tula8','ASC')                    
        ->get();
        $listCallMaterial = convertDb::convertDataBase($datas, convertDb::$mapTable14, true); 
        return $listCallMaterial;
    }

    public static function updateStatus($callID, $status, $note)
    {
        callMaterial::where('tula_key', $callID)->update(['tula7' => $status,'tula10' => $note]);
    }
}