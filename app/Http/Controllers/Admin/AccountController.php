<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function indexRoles(){
        $data = array(
            'list' => DB::table('roles')->get()
        );
        return view('backend.add_roles',$data);
    }
    
    public function addRoles(Request $request){
        $query = DB::table('roles')->insert([ 'name' => $request->input('name_roles')]);
        if ($query) {
            return back()->with('message','Data have been successfully inserted');
        } else {
            return back()->with('message','Something went wrong');
        }
        
    }
    
    public function editRoles($id ) {
        $row = DB::table('roles')->where('id',$id)->first();
        $data = array('info'=> $row);
        return view('backend.edit_roles',$data);
    }
    
    public function updateRoles(Request $request){
        $query = DB::table('roles')->where('id', $request->input('id'))->update([ 'name' => $request->input('name_roles')]);
        return redirect('/admin/account/roles');
    }
    
    public function deleteRoles($id) {
        $delete = DB::table('roles')->where('id', $id)->delete();
        return redirect('/admin/account/roles');
    }

    public function indexAccount(){
        $data = array(
            'roles' => DB::table('roles')->get(),
            'list' =>DB::table('admins')->join('roles','roles.id','=','admins.id_role')->select('admins.*','roles.name as roles_name')->get()
        );
        return view('backend.index_account',$data);
    }
    public function addAccount(Request $request){
        $query = DB::table('admins')->insert([ 
            'name' => $request->input('name'),
            'phone' =>$request->input('phone'),
            'email' =>$request->input('email'),
            'password' => Hash::make($request->input('password')),
            'id_role' =>$request->input('id_roles'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")            

        ]);
        if ($query) {
            return back()->with('message','Data have been successfully inserted');
        } else {
            return back()->with('message','Something went wrong');
        }
        
    }
}