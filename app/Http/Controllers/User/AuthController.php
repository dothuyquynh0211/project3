<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormRegister(){
        return view('frontend.auth.register');
    }
    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->avatar = $request->avatar;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('user.login');
       
        
    }
    function showFormLogin()
    {
        return view('frontend.auth.login');
    }

    function loginUser(Request $request)
    {

        if (Auth::guard('user')->attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]
        )) {
            //Alert::success('Đăng nhập thành công', 'WELCOME TO HOME !!!');
            return redirect()->route('user.home');
            // dd( Auth::guard('admin')->id());
            // return "da dang nhap thang cong";
        } else {
            // return "Dang nhap that bai";
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập');
        }
    }
    function logout()
    {
        Auth::guard('user')->logout();
        //session()->forget('admin');
        return redirect()->route('user.login');
    }
}