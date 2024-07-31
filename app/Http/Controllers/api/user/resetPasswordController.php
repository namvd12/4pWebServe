<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\user;
use App\Models\Authen;
use App\Mail\resetPasswordEmail;
class resetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $request = json_decode($request->getContent(), TRUE);
        if(isset($request['userName']))
        {
            $user = $request['userName'];
            return $this->resetPw($user);
        }
        else
        {
            return $this->responseError();
        }
    }

    protected function resetPw($user)
    {    
        $userInfor = user::findUserInfor($user);
        if($userInfor == null)
        {
            $response["status"]   = 0;
            $response["message"]  = "User or email doesn't exist";
            return json_encode($response);
        }

        /*send email template reset password */
        /*
        * -------------------------------------------------------------------------------
        *   Using email template
        * -------------------------------------------------------------------------------
        */
        /*create seriesID and token*/
        $seriesID = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        /*update seriesID and token to db */
        Authen::updateNewToken($userInfor['userID'], $seriesID, $token);

        // /*handle mailer */
        Mail::to($userInfor['email'])->send(new resetPasswordEmail($userInfor['email'],route('newPassword',['seriesID'=>$seriesID,'token'=>bin2hex($token)]))); 
        $response["status"]   = 1;
        $response["message"]  = "Send email successful";
        return json_encode($response);
    }

    protected function responseError()
    {
        $response["status"] = 2;
        $response["message"] = "Missing mandatory parameters";
        return json_encode($response);
    }
}