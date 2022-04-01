<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportDetail;
use App\Models\Product;
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



    public function index1(){
        $data1 = array(
            'list1' => DB::table('import_details')
            ->join('products','products.id','=','import_details.id_product')
            ->join('invoice_details','invoice_details.id','=','invoice_details.id_product')

            ->select('import_details.id_product','products.name as name_pr',
            DB::raw('sum(import_details.quantity) as sum_quantity'),
            DB::raw('sum(invoice_details.quantity) as sum_quantity_buy'))
            ->groupBy('import_details.id_product')
            ->get()
        );
        return view('backend.warehouse.inventory',$data1);
    }

   
}