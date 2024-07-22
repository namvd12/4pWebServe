<?php

namespace App\Http\Controllers;

use App\Models\tula_table9;
use Illuminate\Http\Request;
use App\Models\tula_table8;
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
            $status = tula_table9::verifyAuth($seriesID,  $token);
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
            $status = tula_table8::updateNewPassword($seriesID, $password);
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