<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
class loginController extends Controller
{
    public function login(Request $request)
    {
        $request = json_decode($request->getContent(), TRUE);
        if(isset($request['username']) && isset($request['password']))
        {
            $user = $request['username'];
            $pass = $request['password'];
            return $this->loginUser($user, $pass);
        }
        else
        {
            return $this->responseError();
        }
    }

    protected function loginUser($user, $pass)
    {
        $userInfor = user::login($user, $pass);
        if($userInfor != null)
        {
            $response["status"] = 1;
            $response["message"]  = "Login successful";
            $response += $userInfor;  
        }
        else
        {
            $response["status"] = 0;
            $response["message"] = "Invalid username and password combination";
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