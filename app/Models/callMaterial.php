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
        $datas = callMaterial::select()
        ->whereRaw("STR_TO_DATE(tula8, '%d-%m-%Y') = ?", [$date])
        ->orderby('tula7','DESC')                    
        ->orderby('tula6','ASC')                    
        ->orderby('tula8','ASC') 
        ->limit(100)
        ->get();   
        return $datas;
    }

    public static function updateStatus($callID, $status, $note)
    {
        callMaterial::where('tula_key', $callID)->update(['tula7' => $status,'tula10' => $note]);
    }

    public static function updateStatusOKAll()
    {
        callMaterial::where('tula7', 'WAIT')->update(['tula7' => "OK"]);
    }
}