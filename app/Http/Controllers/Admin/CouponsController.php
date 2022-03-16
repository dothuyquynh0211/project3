<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    //
    public function indexCoupons()
    {
        $data = array(
            'list' => DB::table('coupons')->get()
        );
        return view('backend.coupons.index_coupons', $data);
    }

    public function add()
    {
        return view('backend.coupons.add_coupons');
    }
    public function addCoupons(Request $request)
    {
        if($request->input('status') == 'on'){
            $status ='1';
        }
        else{
            $status ='0';
        }
        $query = DB::table('coupons')->insert([
            'name' => $request->input('name'),
            'value' => $request->input('value'),
            'coupons_code' => $request->input('coupons_code'),
            'coupons_number' => $request->input('coupons_number'),
            'status' => $status,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);
        if ($query) {
            return redirect('/admin/coupons')->with('message', 'Data have been successfully inserted');
        } else {
            return redirect()->back()->with('message', 'Something went wrong');
        }
    }

    public function editCoupons($id)
    {
        $row = DB::table('coupons')->where('id', $id)->first();
        $data = array(
            'info' => $row,
        );
        return view('backend.coupons.edit_coupons', $data);
    }

    public function updateCoupons(Request $request)
    {
        if($request->input('status') == 'on'){
            $status ='1';
        }
        else{
            $status ='0';
        }
        $query = DB::table('coupons')->where('id', $request->input('id'))->update([
            'name' => $request->input('name'),
            'value' => $request->input('value'),
            'coupons_code' => $request->input('coupons_code'),
            'coupons_number' => $request->input('coupons_number'),
            'status' => $status,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);
        return redirect('/admin/coupons');
    }

    public function deleteCoupons($id)
    {
        $delete = DB::table('coupons')->where('id', $id)->delete();
        return redirect('/admin/coupons');
    }
}