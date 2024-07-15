<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request['isLogout'])) {
            Session::forget('adminID');
            Session::forget('isLogin');
        }


        if (isset($request['isLogin'])) {

            $phone    = $request->get("phone", "");
            $password = $request->get("password", "");

            $checkLogin = User::where(['phone' => $phone, 'password' => $password])->first();
            if ($checkLogin) {
                Session::put('adminID', $checkLogin->id);
                Session::put('isLogin', true);
                return redirect("/");
            } else {
                return redirect()->route('login')->with('error', 'Tài khoản hoặc mật khẩu không chính xác!');
            }
        }

        if (Session::get('isLogin')) {
            return redirect("/");
        }

        return view('login');
    }
}
