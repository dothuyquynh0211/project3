<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ImportgoodsModel 
{
    // use HasFactory;
    // static function index()
    // {
    //     return DB::select("SELECT import_goods.*,admins.name,warehouses.address from import_goods INNER JOIN admins ON import_goods.id_admin = admins.id INNER JOIN warehouses ON import_goods.id_warehouse = warehouses.id ");
    // }
    // static function get($id){
    //     $sql = "SELECT import_goods.*,admins.name,warehouses.address from import_goods INNER JOIN admins ON import_goods.id_admin = admins.id INNER JOIN warehouses ON import_goods.id_warehouse = warehouses.id WHERE import_goods.id = '$id'";
    //    $result = DB::select($sql);
    //     return $result;
    // }
    // static function getadmins()
    // {
    //     return DB::select("SELECT * FROM admins");
    // }
    // static function getwarehouses()
    // {
    //     return DB::select("SELECT * FROM warehouses");
    // }
    // static function store($date, $id_admin, $id_warehouse)

    // {
        
       
    //     return DB::insert("INSERT INTO  import_goods VALUES(NULL,'$date','$id_admin','$id_warehouse')");
    // }
    
    // // static function update($id, $date,$id_admin,$id_warehouse)
    // // {

    // //     return DB::update("UPDATE importgoods SET   id_admin='$id_admin',id_warehouse='$id_warehouse',date='$date', WHERE id='$id'");
    // // }
    // // static function destroy($id)
    // // {
    // //     return DB::delete("DELETE FROM import_goods WHERE id='$id'");
    // // }
    

}
