<?php

namespace App\Http\Controllers\web\login;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\configSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\user;
use App\Models\clientRF;
use App\Models\device;
use App\Models\group;
use App\Models\Permission;

class userSettingsController extends Controller
{
    public function settings(Request $request)
    {
        if(session()->has('userKey'))
        {
            $userKey = session('userKey');
            
            // get user information 
            $userInfor = user::getUserinforByKey($userKey);

            // get group name
            $userInFor['groupName'] = group::getGroupNameByID($userInfor['groupID']); 

            // get systemInfor
            $config = configSystem::getConfigSystem();
            
            // get listUser 
            $listUser = user::getAllUserInfor();

            // get group name
            foreach($listUser as $key => $value)
            {
                $listUser[$key]['groupName'] = group::getGroupNameByID($value['groupID']); 
            }
            
            // get listRF
            $listRF = clientRF::getAllRfClient();

            // get list device
            $listDevice = device::deviceAll();

            // get list categories
            $listCat = categories::getAll();
            
            // check permission to show admin area
            $hasPermissionViewUser = Permission::userHasPermission(['Edit_user','View_user','Delete_user']);

            $hasPermissionViewRFClient = Permission::userHasPermission(['View_setupSystem','Edit_setupSystem','Delete_setupSystem']);
            return view('user.settings',['userInfor' => $userInfor,
                                        'config' => $config,
                                        'listUser' => $listUser,
                                        'listRF' => $listRF,
                                        'listDevice'=> $listDevice,
                                        'listCat' => $listCat,
                                        'hasPermissionViewUser' => $hasPermissionViewUser,
                                        'hasPermissionViewRFClient' => $hasPermissionViewRFClient]);
        }
        else
        {
            return redirect()->route('logout');
        }
    }

    public function saveProfile(Request $request)
    {
        if( $request->get('userName') != null)
        {
            $avatar = $request->get('avatar');
            $fullName = $request->get('fullName');
            $phone = $request->get('phone');
            $email = $request->get('email');
            $userName = $request->get('userName');
            $passwordNew = "";
            $oldPassword = "";
            $status = user::edit($userName, $passwordNew, $oldPassword, $fullName, $phone, $email, $avatar);
            if($status)
            {
                return "OK";
            }
        }
        return "Error";
    }
    public function saveNewPassword(Request $request)
    {
        $response['status'] = "Error login";
   
        if( $request->get('userName') != null && $request->get('oldPassword') != null 
            && $request->get('newPassword') != null)
        {
            $avatar = '';
            $fullName = '';
            $phone = '';
            $email = '';
            $userName = $request->get('userName');
            $passwordNew = $request->get('newPassword');
            $oldPassword = $request->get('oldPassword');

            $status = user::edit($userName, $passwordNew, $oldPassword, $fullName, $phone, $email, $avatar);
            if($status)
            {
                $response['status'] = "OK";
            }
            else
            {
                $response['status'] = "Error login";
            }
            return $response;
        }
        return $response;
    }

    public function saveConfigSystem(Request $request)
    {
        $response['status'] = "Error";
        if( $request->get('timeNG') != null && $request->get('folderReport') != null )
        {
            $timeNG = $request->get('timeNG') ;
            $folder = $request->get('folderReport');

            // check-folder
            if (!is_dir($folder)) {
                $response['status'] = "Error folder";
                return $response;
            } 
            configSystem::saveConfig($timeNG, $folder);
            $response['status'] = "OK";
            return $response;
        }
        return $response;
    }
    public function saveMode(Request $request)
    {
        $response['status'] = "Error";
        if( $request->get('mode') != null)
        {
            $mode = $request->get('mode') ;
            configSystem::saveMode($mode);
            $response['status'] = "OK";
            return $response;
        }
        return $response;
    }
    public function saveLineWorking(Request $request)
    {
        $response['status'] = "Error";
        if( $request->get('LineLTE') != null && $request->get('Line1') != null && $request->get('Line2') != null &&
            $request->get('Line3') != null && $request->get('Line4') != null && $request->get('Line5') != null && 
            $request->get('Line6') != null && $request->get('Line7') != null && $request->get('Line8') != null)
        {
            $lineLTE = $request->get('LineLTE');
            $line1 = $request->get('Line1');
            $line2 = $request->get('Line2');
            $line3 = $request->get('Line3');
            $line4 = $request->get('Line4');
            $line5 = $request->get('Line5');
            $line6 = $request->get('Line6');
            $line7 = $request->get('Line7');
            $line8 = $request->get('Line8');
            $arrayLineWorking = ['LineLTE'=>$lineLTE,'Line1'=>$line1,'Line2'=>$line2,'Line3'=>$line3,
                                'Line4'=>$line4,'Line5'=>$line5,'Line6'=>$line6,'Line7'=>$line7,'Line8'=>$line8];
            configSystem::saveLineWorking($arrayLineWorking);
            $response['status'] = "OK";
            return $response;
        }
        return $response;
    }
}