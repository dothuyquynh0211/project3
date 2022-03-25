<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ImportDetail;

class ImportDetailController extends Controller
{
    //
    // function detail($id)
    // {
      
    //     $dt = ImportDetail::detail($id);
      
    //    return view('backend.importgoods.detail',['dt'=>$dt]);
       
    // }
    // function editd($id)
    // {
    //     $detail1 = ImportDetail::getproducts();
    //     $detail2 = ImportDetail::getdetails();
    //     $detail = ImportDetail::get($id);//doi ty//đây
    //     //  return dd($kiemtra);
    //     return view('backend.importgoods.editd', [
    //         'detail' => $detail,
    //         'detail1' =>$detail1,
    //         'detail2' =>$detail2,
            
    // ]); 
    // }

   
    // function insertd()
    // {
    //     $sql2 = ImportDetail::getborrowpay();
    //     $sql3 = ImportDetail::getbook();

    //     return view('backend.importgoods.insertd', [
    //         'products' => $sql2,
    //         'import_goods'=> $sql3
            
    //     ]);
    // }
    // function stored(Request $req){
    //     $id_product= $req->id_product;
    //     $id_importgoods= $req->id_importgoods;
       
    //     $quantity= $req->quantity;
    //     $cost_price= $req->cost_price;
    //     $rs = ImportDetail::storedetail($quantity,$cost_price,$id_product,$id_importgoods);
    //     if($rs==0) return "Insert thất bại";
    //     else{
    //         //Alert::success('Thêm thành công', 'Success Borrowpay');
    //         return redirect('admin/detail/'. $id_product);
    //     }
    // }
    // function updatedetail(Request $req, $id){
    //     $quantity= $req->input('quantity');
    //     $cost_price= $req->input('cost_price');
    //     $id_product= $req->input('id_product');
    //     $id_importgoods= $req->input('id_importgoods');
        
    //     $rs = ImportDetail::updatedetail($id,$quantity,$cost_price,$id_product,$id_importgoods);
    //     if($rs==0) return "Cập nhật thất bại";
    //     else{
    //         return redirect('/detail/'.$id_product); 
    //     }
    
    // }
    // function destroyd($id){
    //   $rs = ImportDetail::destroyd($id);
    //   if($rs == 0) return "Xóa thất bại";
    //     else{
    //         return view('backend.importgoods.detail'); 
    //     }
    // }
   
}
