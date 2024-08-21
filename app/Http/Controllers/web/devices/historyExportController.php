<?php

namespace App\Http\Controllers\web\devices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\deviceReport;
use App\Models\deviceStatus;
use App\Models\user;
use Illuminate\Support\Facades\Http;
class historyExportController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('historyID') != null)
        {
            $historyInfor = deviceReport::historyByID($request->get('historyID'));
            $userInfor = user::getUserinforByID($historyInfor['userID']);
            if($userInfor == null)
            {
                $userInfor = user::getUserinforByGroup('Engineer');
            }
            $listUserCheck = user::getUserinforByGroup('Part_leader');
            $listUserApprove = user::getUserinforByGroup('Team_leader');
          
            return view('devices.exportHistory',['historyInfor' => $historyInfor, 
                                                 'userInfor'    => $userInfor,
                                                  'listUserCheck'   => $listUserCheck,
                                                  'listUserApprove' => $listUserApprove],
                                                 );
        }
    }

    public function export(Request $request)
    {
        if($request->get('historyID') != null)
        {
            $machineCode = $request->get('machineCode');
            $machineName = $request->get('machineName');
            $line_lane = $request->get('line_lane');
            $troubleName = $request->get('troubleName');
            $issue = $request->get('issue');
            $checking1 = $request->get('checking1');
            $checking2 = $request->get('checking2');
            $action1 = $request->get('action1');
            $action2 = $request->get('action2');
            $result = $request->get('result');
            $writer = $request->get('writer');
            $checked = $request->get('checked');
            $approved = $request->get('approved');
            $historyID = $request->get('historyID');
            // save to database
            deviceStatus::updateDataHistoryByID($historyID, $troubleName, $issue, $checking1, $checking2, $action1, $action2, $result);
            
            // create PPT
            return $this->request_to_create_ppt($historyID, $writer, $checked, $approved);           
        }
        else
        {
            return "Error";
        }
    }

    protected function request_to_create_ppt($historyID, $writer, $checked, $approved)
    {
        $response = Http::post('http://localhost:8888/api/exportData/', [
            'historyID' => $historyID,
            'writer' => $writer,
            'check' => $checked,
            'approved' => $approved
        ]);
        
        if ($response->successful()) {
            // Handle the successful response
            $data = $response->body();
        } else {
            // Handle the error
            $data = $response->body();
        }
        return $data;
    }
}