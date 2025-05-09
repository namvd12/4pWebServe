<?php

namespace App\Http\Controllers\web\user;

use App\Http\Controllers\Controller;
use App\Models\user;
use App\Models\clientRF;
use App\Models\device;
use App\Models\group;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function editUser(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('userID') != null)
        {
            $userID = $request->get('userID');
            /*get user infor */
            $userInfor = user::getUserinforByID($userID);    
            $userInfor = $userInfor[0];
            /*get group Name */
            $userInfor['groupName'] = group::getGroupNameByID($userInfor['groupID']); 
            
            /*get list position */
            $listPosition = group::getListGroup();

            return view('user.userEditTab',['userInfor' => $userInfor,
                                            'listPosition' => $listPosition,
                                            'listGroup' => $listPosition,]); 
        }
        return $response;
    }

    public function saveEditUser(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('userID') != null && $request->get('userName') != null && $request->get('userPosition') != null)
        {
            $userID = $request->get('userID');
            $userName = $request->get('userName');
            $userPosition = $request->get('userPosition');
            $fullName = $request->get('fullName');
            $userPhone = $request->get('userPhone');
            $userEmail = $request->get('userEmail');
            $userGroup = $request->get('userGroup');

            $userTopic = $request->get('userTopic');
            $userNewPassword = $request->get('userNewPassword');
            
            $userGroupID = group::getGroupIDByName($userGroup);
            $status =  user::editByUserID($userID, $userName, $userNewPassword, $fullName, $userPhone, $userEmail, $userGroupID, $userTopic, $userPosition);

            if($status)
            {
                $response['status'] = "OK";
            }
        }
        return $response;
    }

    public function deleteUser(Request $request) 
    {
        $response['status'] = "Error";
        if($request->get('userKey') != null)
        {
            $userKey = $request->get('userKey');
            user::deleteByID($userKey);
            $response['status'] = "OK";           
        }
        return $response;
    }

    public function addNewUser(Request $request)
    {
        /*get list position */
        $listPosition = group::getListGroup();
        return view('user.userAddTab',['listPosition' => $listPosition]);
    }

    public function saveAddNewUser(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('userID') != null && $request->get('userName') != null && $request->get('userPosition') != null
            && $request->get('userGroup') != null && $request->get('userTopic') != null)
        {
            $userID = $request->get('userID');
            $userName = $request->get('userName');
            $userPosition = $request->get('userPosition');
            $userGroup = $request->get('userGroup');
            $userTopic = $request->get('userTopic');
            $userFullName = $request->get('fullName');
            $userPhone = $request->get('userPhone');
            $userEmail = $request->get('userEmail');
            $userNewPassword = $request->get('userNewPassword');
            $userGroupID = group::getGroupIDByName($userGroup);
            $status = user::addNew($userID, $userName, $userPosition, $userFullName, $userPhone, $userEmail, $userGroupID, $userTopic, $userNewPassword);
            
            if($status)
            {
                $response['status'] = "OK";
            }
        }
        return $response;
    }

    /*RF setting */

    public function addNewRF(Request $request)
    {
        /*get list deviceID */
        $listDeviceInfor = device::deviceAllNotSubdevice();
        
        /*get list region */
        $listRegion = clientRF::getListRegion();
        return view('user.RFAddTab',[ 'listDeviceInfor' =>$listDeviceInfor ,
                                    'listRegion' => $listRegion]);
    }
    public function addNewRFRegion(Request $request)
    {
        return view('user.RFAddRegionTab');
    }
    
    public function editRF(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('RFID') != null)
        {
            $RFID = $request->get('RFID');
            /*get user infor */
            $rfInfor = clientRF::getRFinforByID($RFID);    
            $rfInfor = $rfInfor[0];

            /*get list deviceID */
            $listDeviceInfor = device::deviceAll();
      
            /*get list region */
            $listRegion = clientRF::getListRegion();

            return view('user.RFEditTab',['rfInfor' => $rfInfor,
                                          'listDeviceInfor' =>  $listDeviceInfor,
                                          'listRegion' => $listRegion]); 
        }
        return $response;
    }


    public function saveEditRF(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('rf_id') != null && $request->get('device_id') != null && $request->get('device_code') != null)
        {
            $rf_id = $request->get('rf_id');
            $device_id = $request->get('device_id');
            $device_code = $request->get('device_code');
            $client_addr = $request->get('client_addr');
            $client_port = $request->get('client_port');
            $region_name = $request->get('region_name');
            $numberDevice = $request->get('numberDevice');

            $status =  clientRF::editRF($rf_id, $device_id, $device_code, $client_addr, $client_port, $region_name, $numberDevice);

            if($status)
            {
                $response['status'] = "OK";
            }
        }
        return $response;
    }
    public function saveAddNewRF(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('client_addr') != null && $request->get('client_port') != null && $request->get('device_code') != null 
        && $request->get('region') != null && $request->get('numberDevice') != null)
        {
            $client_addr = $request->get('client_addr');
            $client_port = $request->get('client_port');
            $device_code = $request->get('device_code');
            $region = $request->get('region');
            $numberDevice = $request->get('numberDevice');

            $status = clientRF::addNew($client_addr, $client_port, $device_code, $region, $numberDevice);

            if($status)
            {
                $response['status'] = "OK";
            }
        }
        return $response;
    }

    public function deleteRF(Request $request) 
    {
        $response['status'] = "Error";
        if($request->get('key') != null)
        {
            $RFKey = $request->get('key');
            clientRF::deleteByID($RFKey);
            $response['status'] = "OK";           
        }
        return $response;
    }

    public function saveRFRegion(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('line_region') != null && $request->get('region_add') != null)
        {
            $line_region = $request->get('line_region');
            $region_add = $request->get('region_add');

            $status = clientRF::addNewRegion($line_region, $region_add."_".$line_region);

            if($status)
            {
                $response['status'] = "OK";
            }
        }
        return $response;
    }
}