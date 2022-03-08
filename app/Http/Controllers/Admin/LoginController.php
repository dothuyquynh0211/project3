<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class LoginController extends Controller
{
    //
    function showLoginForm()
    {
        return view('backend.auth.login');
    }

    function login(Request $request)
    {

        if (Auth::guard('admin')->attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]
        )) {
            //Alert::success('Đăng nhập thành công', 'WELCOME TO HOME !!!');
            return redirect()->route('admin.home');
            // dd( Auth::guard('admin')->id());
            // return "da dang nhap thang cong";
        } else {
            // return "Dang nhap that bai";
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập');
        }
    }
    function logout()
    {
        Auth::guard('admin')->logout();
        //session()->forget('admin');
        return redirect()->route('admin.login');
    }
}
