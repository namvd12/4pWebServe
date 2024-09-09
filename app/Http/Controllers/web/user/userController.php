<?php

namespace App\Http\Controllers\web\user;

use App\Http\Controllers\Controller;
use App\Models\user;
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
}