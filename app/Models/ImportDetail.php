<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImportDetail extends Model
{
//     use HasFactory;
//     static function detail($id)
//     {
//         return DB::select("SELECT import_details.*,products.name,products.image,import_goods.date from import_details 
//         INNER JOIN products ON import_details.id_product = products.id INNER JOIN import_goods ON import_details.id_importgoods = import_goods.id
//           ");
//     }
//     static function get($id){
//         $sql = "SELECT import_details.*,products.name,products.image,import_goods.date from import_details 
//         INNER JOIN products ON import_details.id_product = products.id INNER JOIN import_goods ON import_details.id_importgoods = import_goods.id
//         '";
//        $result = DB::select($sql);
//         return $result;
//     }
//     static function getproducts()
//     {
//         // return DB::select("SELECT borrowpay.*,student.name,student.class FROM student INNER JOIN student ON borrowpay.id_student = student.id");
//       return DB::select("SELECT * FROM products");
//     //    return DB::table('products')->join('colors','colors.id','products.id_color')
       
//     //    ->get(); 
     
//     }
//     static function getimportgoods()
//     {
//         return DB::select("SELECT * FROM import_goods");
//     }
//     static function storedetail($quantity, $cost_price, $id_product,$id_importgoods)
//     {
//         return DB::table('import_details')->insert([
//             'id' => null,

//             'id_product' => $id_product,
//             'id_book' => $cost_price,
//             'quantity' => $quantity,
//             'id_importgoods' => $id_importgoods
//         ]);
//     }
//     static function updatedetail($id, $quantity,$cost_price,$id_product,$id_importgoods) {

//         return DB::update("UPDATE import_details SET quantity='$quantity',cost_price='$cost_price',quantity='$quantity',id_product='$id_product',id_importgoods='$id_importgoods' WHERE id='$id'");
//     }
//     static function destroyd($id)
//     {
//         return DB::delete("DELETE FROM detail WHERE id='$id'");
//     }
    
}
