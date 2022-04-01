<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportgoodsController extends Controller
{
    //
    public function indexImportgoods()
    {
        $data = array(
            'list' => DB::table('import_goods')->join('admins','admins.id','=','import_goods.id_admin')
            ->select('import_goods.*','admins.name as name_admin','warehouses.address')
            ->join('warehouses','warehouses.id','=','import_goods.id_warehouse')
  
            ->get()
        );
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        return view('backend.importgoods.index_importgoods', $data)->with('today',$today);
    }

    public function add()
    {
        $data1 = array(
            'admins' => DB::table('admins')->get(),
            'warehouses' => DB::table('warehouses')->get(),
            
        );
        return view('backend.importgoods.add_importgoods', $data1);
       
    }
  

    public function addImportgoods(Request $request)
    {
       
        DB::beginTransaction();
        try{
            DB::table('import_goods')->insert([
                'date' => $request->input('date'),
                'id_admin' => $request->input('id_admin'),
                'id_warehouse' => $request->input('id_warehouse'),
               
                
            ]);
            $importgoods_id = DB::getPDO()->lastInsertId();
            // dd($importgoods_id);
            // die();
            foreach($request->product_id as $p_id){
                DB::table('import_details')->insert([
                    'id_product'=>$p_id,
                    'id_importgoods' =>$importgoods_id,
                    'quantity' => $request->input('quantity'),
                    'cost_price' => $request->input('cost_price'),
                ]);
            }
            DB::commit();
            return redirect('/admin/importgoods')->with('message', 'Data have been successfully inserted');
            
        }catch (Exception $e){
            DB::rollBack();  
            return redirect()->back()->with('message', 'Something went wrong');

        }
    }

    public function editImportgoods($id)
    {
        $row = DB::table('import_goods')->where('id', $id)->first();
        $data = array(
            'info' => $row,
        );
        return view('backend.importgoods.edit', $data);
    }

    public function updateImportgoods(Request $request)
    {
        
        $query = DB::table('import_goods')->where('id', $request->input('id'))->update([
            'date' => $request->input('date'),
            'id_admin' => $request->input('id_admin'),
            'id_warehouse' => $request->input('id_warehouse'),
           
        ]);
        return redirect('/admin/importgoods');
    }

    public function deleteImportgoods($id)
    {
        $delete = DB::table('import_goods')->where('id', $id)->delete();
        return redirect('/admin/importgoods');
    }
    public function action(Request $request)
    {

        $value = $request->all()['value'];
        $filter_data = Product::select('*')->where('name', 'LIKE', '%' . $value . '%')
            //     // ->orWhere('sku', 'LIKE', '%' . $query . '%')
            ->get(5);
        echo json_encode($filter_data, JSON_UNESCAPED_UNICODE);
    }
    public function getProduct(Request $request)
    {

        $value = $request->all()['id'];
        $filter_data = Product::select('*')->where('id', '=', $value)
            //     // ->orWhere('sku', 'LIKE', '%' . $query . '%')
            ->get(1);
        echo json_encode($filter_data, JSON_UNESCAPED_UNICODE);
    }
    public function detail($id)
    {

        
        $row = DB::table('import_details')->join('products','products.id','=','import_details.id_product')
        ->select('import_details.*','products.name as name_pr')->where('import_details.id_importgoods', $id)->get();
        $data = array(
            'info' => $row,
        );
        return view('backend.importgoods.detail', $data);
    }
}