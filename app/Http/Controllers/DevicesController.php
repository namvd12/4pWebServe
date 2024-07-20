<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tula_table1;
class DevicesController extends Controller
{
    public function index()
    {
        $device = new tula_table1();
        $deviceNG = $device->deviceNG();

        return view('devices.index',['deviceNG'=>$deviceNG]);    
        //return view('devices.index',compact($deviceNG));
    }
}