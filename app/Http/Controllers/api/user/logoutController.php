<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tula_table8;
class logoutController extends Controller
{
    public function logout(Request $request)
    {
        $request = json_decode($request->getContent(), TRUE);
        if(isset($request['userName']))
        {
            $username = $request['userName'];
            return $this->logoutUser($username);
        }
        else
        {
            return $this->responseError();
        }
    }

    protected function logoutUser($username)
    {
        $response["status"] = 1;
		$response["message"]  = "Logout successful";
        return json_encode($response);
    }

    protected function responseError()
    {
        $response["status"] = 2;
        $response["message"] = "Missing mandatory parameters";
        return json_encode($response);
    }
}