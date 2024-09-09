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
        $datas = clientRF::all();
        $listRF = convertDb::convertDataBase($datas, convertDb::$mapTable3, true); 
        return $listRF;
    }
}