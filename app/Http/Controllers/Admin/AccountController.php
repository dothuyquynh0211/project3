<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function indexRoles()
    {
        $data = array(
            'list' => DB::table('roles')->get()
        );
        return view('backend.account.index_roles', $data);
    }

    public function addRoles(Request $request)
    {
        $query = DB::table('roles')->insert(['name' => $request->input('name_roles')]);
        if ($query) {
            return back()->with('message', 'Data have been successfully inserted');
        } else {
            return back()->with('message', 'Something went wrong');
        }
    }

    public function editRoles($id)
    {
        $row = DB::table('roles')->where('id', $id)->first();
        $data = array('info' => $row);
        return view('backend.account.edit_roles', $data);
    }

    public function updateRoles(Request $request)
    {
        $query = DB::table('roles')->where('id', $request->input('id'))->update(['name' => $request->input('name_roles')]);
        return redirect('/admin/account/roles');
    }

    public function deleteRoles($id)
    {
        $delete = DB::table('roles')->where('id', $id)->delete();
        return redirect('/admin/account/roles');
    }

    public function indexAccount()
    {
        $data = array(
            'roles' => DB::table('roles')->get(),
            'list' => DB::table('admins')->join('roles', 'roles.id', '=', 'admins.id_role')->select('admins.*', 'roles.name as roles_name')->get()
        );
        return view('backend.account.index_account', $data);
    }
    public function addAccount(Request $request)
    {
        $query = DB::table('admins')->insert([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'id_role' => $request->input('id_roles'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        if ($query) {
            return back()->with('message', 'Data have been successfully inserted');
        } else {
            return back()->with('message', 'Something went wrong');
        }
    }

    public function editAccount($id)
    {
        $row = DB::table('admins')->where('id', $id)->first();
        $data = array(
            'info' => $row,
            'roles' => DB::table('roles')->get(),
        );
        return view('backend.account.edit_account', $data);
    }

    public function updateAccount(Request $request)
    {
        $query = DB::table('admins')->where('id', $request->input('id'))->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'id_role' => $request->input('id_roles'),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        return redirect('/admin/account/staff');
    }

    public function deleteAccount($id)
    {
        $delete = DB::table('admins')->where('id', $id)->delete();
        return redirect('/admin/account/staff');
    }

    public function indexCustomer()
    {
        $data = array(
            'list' => DB::table('users')->get()
        );
        return view('backend.account.index_customer', $data);
    }

    public function add()
    {
        return view('backend.account.add_customer');
    }
    public function addCustomer(Request $request)
    {
        $query = DB::table('users')->insert([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'avatar' => $request->input('avt'),
            'password' => Hash::make($request->input('password')),

        ]);
        if ($query) {
            return redirect('/admin/account/customer')->with('message', 'Data have been successfully inserted');
        } else {
            return redirect()->back()->with('message', 'Something went wrong');
        }
    }

    public function editCustomer($id)
    {
        $row = DB::table('users')->where('id', $id)->first();
        $data = array(
            'info' => $row,
        );
        return view('backend.account.edit_customer', $data);
    }

    public function updateCustomer(Request $request)
    {
        $query = DB::table('users')->where('id', $request->input('id'))->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'avatar' => $request->input('avt'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect('/admin/account/customer');
    }

    public function deleteCustomer($id)
    {
        $delete = DB::table('users')->where('id', $id)->delete();
        return redirect('/admin/account/customer');
    }
}