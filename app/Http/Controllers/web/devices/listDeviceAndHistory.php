<?php

namespace App\Http\Controllers\web\devices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\device;
use App\Models\deviceReport;
use App\Models\deviceStatus;

class listDeviceAndHistory extends Controller
{
    public function index(Request $request)
    {
        $listDevice = device::deviceAll();
        return view('devices.listDevicesAndHistory',['listDevice' => $listDevice]);
    }

    public function searchDevice(Request $request)
    {
        $response = "";

        $response.= $request->get('dataSearch');
        if($request->get('dataSearch') != null)
        {
            $listDevice = device::searchDevice($request->get('dataSearch'));
            return view('devices.listDeviceTable',['listDevice' => $listDevice]);
        }
        else
        {   
            $listDevice = device::deviceAll();
            return view('devices.listDeviceTable',['listDevice' => $listDevice]);
        }
    }

    public function searchHistoryReport(Request $request)
    {
        if($request->get('timeForm') != null && $request->get('timeTo') != null)
        {
            $dateForm = $request->get('timeForm') ;
            $dateTo = $request->get('timeTo') ;
            $dataSearch = $request->get('dataSearch') ;
            $listHistoryReport  = deviceReport::listHistoryReportSearch( $dataSearch, $dateForm, $dateTo);
            return view('devices.listHistoryReportTable',['listHistoryReport' => $listHistoryReport]);
        }
        else
        {   
            return 'Error';
        }
    }

    public function newDevice(Request $request)
    {
        return view('devices.newDevice');
    }

    public function saveNewDevice(Request $request)
    {
        if($request->get('machineCode') != null && $request->get('machineName') != null &&
            $request->get('line') != null && $request->get('lane') != null)
        {

            $machineCode = $request->get('machineCode');
            $machineName = $request->get('machineName');
            $line = $request->get('line');
            $lane = $request->get('lane');
            $Model = $request->get('model') == null ? "":$request->get('model');
            $Serial = $request->get('serial') == null ? "":$request->get('serial');
            $topBot = $request->get('topBot') == null ? "":$request->get('topBot');
            $status = device::addNewDevice($machineCode, $machineName, $line, $lane, $Model, $Serial, $topBot);
            if($status == true)
            {
                return redirect()->route('listDeviceAndHistory');
            }
            else
            {
                return "Error";
            }
        }
    }

    public function editDevice(Request $request)
    {
        if($request->get('deviceID') != null)
        {
            $device = device::findOneDevice($request->get('deviceID'));
            return view('devices.editDevice',['device' => $device[0]]);
        }
    }
    
    public function saveEditDevice(Request $request)
    {
        if($request->get('machineCode') != null && $request->get('machineName') != null &&
            $request->get('line') != null && $request->get('lane') != null)
        {
            $machineCode = $request->get('machineCode');
            $machineName = $request->get('machineName');
            $line = $request->get('line');
            $lane = $request->get('lane');
            $Model = $request->get('model');
            $Serial = $request->get('serial');
            $topBot = $request->get('topBot');
            $status = device::editDevice($machineCode, $machineName, $line, $lane, $Model, $Serial, $topBot);
            if($status == true)
            {
                return redirect()->route('listDeviceAndHistory');
            }
            else
            {
                return "Error";
            }
        }
    }

    // public function deleteMachine(Request $request)
    // {
    //     if($request->get('machineCode') != null)
    //     { 
    //         $machineCode = $request->get('machineCode'); 
    //         device::deleteMachineByCode($machineCode);
    //         return 'OK';
    //     }
    //     else
    //     {
    //         return 'Error';
    //     }
    // }

    public function deleteHistory(Request $request)
    {
        if($request->get('historyID') != null && $request->get('historyIDOK') != null)
        { 
            $historyID = $request->get('historyID');
            $historyIDOK = $request->get('historyIDOK');
            deviceStatus::deleteByID($historyID);
            deviceStatus::deleteByID($historyIDOK);
            deviceReport::deleteByIDHistory($historyID);
            deviceReport::deleteByIDHistory($historyIDOK);

            // refrest table
            $dateForm = $request->get('timeForm') ;
            $dateTo = $request->get('timeTo') ;
            $dataSearch = $request->get('dataSearch') ;
            $listHistoryReport  = deviceReport::listHistoryReportSearch( $dataSearch, $dateForm, $dateTo);
            return view('devices.listHistoryReportTable',['listHistoryReport' => $listHistoryReport]);
        }
        else
        {
            return 'Error';
        }
    }
}