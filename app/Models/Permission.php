<?php

namespace App\Models;

use GPBMetadata\Google\Protobuf\Struct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'tula_table11';
    
    public $listPermission = ['View_user', 'Edit_user', 'Delete_user',
                             'View_device', 'Edit_device', 'Delete_device',
                             'View_devicePlan','Edit_devicePlan','Delete_devicePlan',
                             'View_sparePart', 'Edit_sparePart', 'Delete_sparePart'];
                             
    public static function userHasPermission($permission)
    {
        if (session()->has('userKey'))
        {
            $userkey = session('userKey');
            $count = Permission::join('tula_table12','tula_table11.tula_Key','tula_table12.tula2')
                        ->join('tula_table8','tula_table8.tula9', 'tula_table12.tula1')
                        ->where('tula_table8.tula_Key', $userkey)
                        ->whereIn('tula_table11.tula1', $permission)
                        ->count();
            if($count > 0)
            {
                return true;
            }
        }
        return false;
    }
}