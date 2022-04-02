<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth.admins');
    }
    function index()
    {
        $new_order = DB::table('invoices')->where('status_order', 1)->get()->count();
        $product = DB::table('products')->get()->count();
        return view('backend.home')->with('new_order', $new_order)->with('product', $product);
    }
}