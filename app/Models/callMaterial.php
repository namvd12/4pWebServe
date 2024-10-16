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

    public static function updateStatus($callID, $status)
    {
        callMaterial::where('tula_key', $callID)->update(['tula8' => $status]);
    }
}