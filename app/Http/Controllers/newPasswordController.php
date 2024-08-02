<?php

namespace App\Http\Controllers;

use App\Models\Authen;
use Illuminate\Http\Request;
use App\Models\user;
class newPasswordController extends Controller
{
    //
    public function newPassword(Request $request)
    {
        if(($request->get('seriesID') != null) && ($request->get('token') != null))
        {
            $seriesID = $request->get('seriesID');
            $token = $request->get('token');
            // verify seriesID and token
            $status = Authen::verifyAuth($seriesID,  $token);
            if($status)
            {
                return view('userPassword.newPassword',['seriesID'=>$seriesID]);
            }
            else
            {
                return "ERROR";
            }
        }
        else
        {
            return "ERROR";
        }
    }

    public function resetPassword(Request $request)
    {
        if(($request->get('seriesID') != null) && ($request->get('confirmPassword') != null))
        {
            $seriesID = $request->get('seriesID');
            $password = $request->get('confirmPassword');
            $status = user::updateNewPassword($seriesID, $password);
            if($status)
            {
                $textStatus = "DONE";
            }
            else
            {
                $textStatus = "ERROR";
            }
            return view('userPassword.resetStatus',['textStatus'=>$textStatus]);
        }
    }
}