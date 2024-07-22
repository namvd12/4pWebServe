<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tula_table8;
class editController extends Controller
{
    public function edit(Request $request)
    {
        $request = json_decode($request->getContent(), TRUE);
        if(isset($request['userName']) && (isset($request['level']) || isset($request['userID']) || isset($request['fullName']) 
                                        || isset($request['phone']) || isset($request['email']) || isset($request['avatar'])
                                        || (isset($request['password']) && isset($request['oldPassword']))))
        {
            $userName   	= $request['userName'];
            $passwordNew 	= array_key_exists('password',$request)? $request['password'] : "";
            $oldPassword 	= array_key_exists('oldPassword',$request)? $request['oldPassword'] : "";
            // $userID 		= array_key_exists('userID',$request)? $request['userID'] : "";
            // $level    		= array_key_exists('level',$request)? $request['level'] : "";
            $fullName 		= array_key_exists('fullName',$request)? $request['fullName'] : "";
            $phone 			= array_key_exists('phone',$request)? $request['phone'] : "";
            $email 			= array_key_exists('email',$request)? $request['email'] : "";
            $Avatar     	= array_key_exists('avatar',$request)? $request['avatar'] : "";
            return $this->editUser($userName, $passwordNew, $oldPassword, $fullName, $phone, $email, $Avatar);
        }
        else
        {
            $this->responseError();
        }
    }

    protected function editUser($userName, $passwordNew, $oldPassword, $fullName, $phone, $email, $Avatar)
    {
        $status = tula_table8::edit($userName, $passwordNew, $oldPassword, $fullName, $phone, $email, $Avatar);
        if($status)
        {
            $response["status"]   = 1;          // 1: Successful
            $response["message"]  = "Successful";
        }
        else
        {
            $response["status"] = 0;
            $response["message"] = "false";
        }
        return json_encode($response);
    }

    protected function responseError()
    {
        $response["status"] = 2;
        $response["message"] = "Missing mandatory parameters";
        return json_encode($response);
    }
}