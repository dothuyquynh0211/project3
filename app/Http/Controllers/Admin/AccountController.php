<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function index(){
        $data = array(
            'list' => DB::table('roles')->get()
        );
        return view('backend.add_roles',$data);
    }
    public function add(Request $request){
        // $nameRoles = $request->input('name_roles');
        // dd($nameRoles);
        $query = DB::table('roles')->insert([ 'name' => $request->input('name_roles')]);
        if ($query) {
            return back()->with('message','Data have been successfully inserted');
        } else {
            return back()->with('message','Something went wrong');
        }
        
    }
}