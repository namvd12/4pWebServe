<?php

namespace App\Http\Controllers\web\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
class loginController extends Controller
{
    public function index(Request $request)
    {
        return view("login");
    }

    public function loging(Request $request)
    {
        if($request->get('user') && $request->get('password'))
        {
            $user = $request->get('user');
            $pass = $request->get('password'); 
            $userInfor = user::login($user, $pass);
            if($userInfor != null)
            {
                // Save userID to session
                session(['lastActivityTime' => now()]);
                session([
                        'userKey' => $userInfor['userKey'],
                        'userFullName' => $userInfor['fullName'],
                        ]);
                return redirect()->route('maintenacePlan');
            }
            else
            {
                return view('login',["statusLogin"=> 'The Username or Password is Incorrect']);
            }
        }
        else
        {
            return view('login');
        }
    }
    public function logout(Request $request)
    {
        session()->forget('userKey');
        session()->forget('userFullName');
        return view('login');
    }
}