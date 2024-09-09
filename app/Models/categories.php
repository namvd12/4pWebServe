<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $table = 'tula_table13';
    public $timestamps = false;

    public static function addNewCategories($name, $action, $status, $description)
    {
        // check name exits
        $datas = categories::select('tula_Key')->where('tula1', $name)->get();
        $listCat = convertDb::convertDataBase($datas,convertDb::$mapTable13);
        if(count($listCat) > 0)
        {
            return "-1";
        }
        categories::insert(['tula1' => $name,
                            'tula2' => $action,
                            'tula3' => $status,
                            'tula4' => $description,
                            ]);
        $datas = categories::select('tula_Key')->where('tula1', $name)->get();
        $Cat = convertDb::convertDataBase($datas,convertDb::$mapTable13);
        return $Cat[0]['catID'];
    }

    public static function editCategories($id ,$name, $action, $status, $description)
    {
        categories::select('tula_Key')->where('tula_Key', $id)->update(['tula1' => $name,
                                                                                'tula2' => $action,                                            
                                                                                'tula3' => $status,                                            
                                                                                'tula4' => $description,                                            
                                                                                 ]);
    }

    public static function getAll()
    {
        $datas = categories::all();
        $listCat = convertDb::convertDataBase($datas,convertDb::$mapTable13);

        // find number device same category

        foreach($listCat as $key => $value)
        {
            $listDevice = device::getListdeviceByCategory($value['catID']);
            $listCat[$key]['numberDevice'] = count($listDevice);
        }
        return $listCat;
    }

    public static function deleteByID($ID)
    {
        categories::where('tula_Key', $ID)->delete();
    }

    public static function getCategoryByID($ID)
    {
        $datas = categories::where('tula_Key', $ID)->get();
        $cat = convertDb::convertDataBase($datas,convertDb::$mapTable13);
        return $cat[0]; 
    }
}