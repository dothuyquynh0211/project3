<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\ImportgoodsModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ImportgoodsController extends Controller
{
   
  
    function index()
    {
        
        $importgoods = ImportgoodsModel::index();
      
       return view('backend.importgoods.index_importgoods',['importgoods'=>$importgoods]);
       
    }
   

   
    function create()
    {
        $sql1 = ImportgoodsModel::getadmins();
        $sql2 = ImportgoodsModel::getwarehouses();

        return view('backend.importgoods.add_importgoods', [
            'admins' => $sql1,
            'warehouses'=> $sql2
            
        ]);
    }
    function store(Request $req){
        $date= $req->input('date');
        $id_admin= $req->input('id_admin');
        $id_warehouse= $req->input('id_warehouse');
       
        $rs = ImportgoodsModel::store($date,$id_admin,$id_warehouse);
        if($rs==0) return "Insert thất bại";
        else{
            // Alert::success('Thêm thành công', 'Success Borrowpay');
            return redirect('/admin/importgoods');
        }
    }
    public function edit($id)
    {
        $row = DB::table('import_goods')->where('id', $id)->first();
        $data = array(
            'info' => $row,
            'admins' => DB::table('admins')->get(),
            'warehouses' => DB::table('warehouses')->get(),
        );
        return view('backend.importgoods.edit', $data);
    }

    public function update(Request $request)
    {
        $query = DB::table('import_goods')->where('id', $request->input('id'))->update([
           
            'id_warehouse' => $request->input('id_warehouse'),
            'id_admin' => $request->input('id_admin'),
            'date' => date("Y-m-d H:i:s")
        ]);
        return redirect('/admin/importgoods/');
    }

    public function delete($id) {
        $delete = DB::table('import_goods')->where('id', $id)->delete();
        return redirect('/admin/importgoods/');
    
    }
}
