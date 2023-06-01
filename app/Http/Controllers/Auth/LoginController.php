<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginPostRequest;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function post(LoginPostRequest $request)
    {
        $checkLogin = $this->userModel->select("*")->where("username",$request->username)->first();
        if(Hash::check($request->password, ($checkLogin->password??""))){   
            session([
                "user_id" => $checkLogin->id,
                "username" => $checkLogin->username,
                "group" => $checkLogin->getUserGroup->name,
            ]);
        }else{   
            return redirect()->back()->with("error","Username And Password Not Match");
        }
        return redirect()->route("cpanel_admin.dashboard");
    }
    public function logout()
    {
        Session::flush();
        return redirect("/");
    }
}
