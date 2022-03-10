<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    //
    function showLoginForm()
    {
        return view('fontend.auth.register');
    }
    function login(Request $request)
    {
    }

}
