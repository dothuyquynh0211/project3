<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    //
    public function index(){
        $data = array(
            'list' => DB::table('warehouses')->get()
        );
        return view('backend.warehouse.index_warehouse',$data);
    }
    
    public function add(Request $request){
        $query = DB::table('warehouses')->insert([ 'address' => $request->input('address')]);
        if ($query) {
            return back()->with('message','Data have been successfully inserted');
        } else {
            return back()->with('message','Something went wrong');
        }
        
    }
    
    public function edit($id ) {
        $row = DB::table('warehouses')->where('id',$id)->first();
        $data = array('info'=> $row);
        return view('backend.warehouse.edit_warehouse',$data);
    }
    
    public function update(Request $request){
        $query = DB::table('warehouses')->where('id', $request->input('id'))->update([ 'address' => $request->input('address')]);
        return redirect('/admin/warehouse');
    }
    
    public function delete($id) {
        $delete = DB::table('warehouses')->where('id', $id)->delete();
        return redirect('/admin/warehouse');
    }
}