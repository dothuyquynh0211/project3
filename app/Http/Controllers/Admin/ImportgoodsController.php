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
   
  
    function indexImportgoods()
    {
        
        $importgoods = ImportgoodsModel::indexImportgoods();
      
       return view('backend.importgoods.index_importgoods',['importgoods'=>$importgoods]);
       
    }
    function edit($id)
    {   $importgoods = ImportgoodsModel::get($id);
        $importgoods1 = ImportgoodsModel::getadmins();
        $importgoods2= ImportgoodsModel::getwarehouses();
        //doi ty//đây
        //  return dd($kiemtra);
        return view('backend.importgoods.edit', [
            'importgoods' => $importgoods,
            'importgoods1' =>$importgoods1,
            'importgoods2' =>$importgoods2,
            
    ]); 
    }

   
    function addImportgoods()
    {
        $sql1 = ImportgoodsModel::getadmins();
        $sql2 = ImportgoodsModel::getwarehouses();

        return view('backend.importgoods.add_importgoods', [
            'admins' => $sql1,
            'warehouses'=> $sql2
            
        ]);
    }
    function store(Request $req){
        $date= $req->date;
        $id_admin= $req->id_admin;
        $id_warehouse= $req->id_warehouse;
       
       
        $rs = ImportgoodsModel::store($date,$id_admin,$id_warehouse);
        if($rs==0) return "Insert thất bại";
        else{
            // Alert::success('Thêm thành công', 'Success Borrowpay');
            return redirect('/admin/warehouse/import');
        }
    }
    // function update(Request $req, $id){

    //      $date= $req->date;
    //     $id_admin= $req->id_admin;
    //     $id_warehouse= $req->id_warehouse;
       
       
    //     $rs = ImportgoodsModel::update($dates,$id_admin,$id_warehouse);
    //     if($rs==0) return "Cập nhật thất bại";
    //     else{
    //         return redirect('/admin/importgoods'); 
    //     }
    
    // }
    function destroy($id){
      $rs = ImportgoodsModel::destroy($id);
      if($rs == 0) return "Xóa thất bại";
        else{
            return view('backend.importgoods.index'); 
        }
    }
}
