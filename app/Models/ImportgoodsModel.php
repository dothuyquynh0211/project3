<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ImportgoodsModel 
{
    use HasFactory;
    static function indexImportgoods()
    {
        return DB::select("SELECT importgoods.*,admins.name,warehouses.address from importgoods INNER JOIN admins ON importgoods.id_admin = admins.id INNER JOIN warehouses ON importgoods.id_warehouse = warehouses.id ");
    }
    static function get($id){
        $sql = "SELECT importgoods.*,admins.name,warehouses.address from importgoods INNER JOIN admins ON importgoods.id_admin = admins.id INNER JOIN warehouses ON importgoods.id_warehouse = warehouses.id WHERE importgoods.id = '$id'";
       $result = DB::select($sql);
        return $result;
    }
    static function getadmins()
    {
        return DB::select("SELECT * FROM admins");
    }
    static function getwarehouses()
    {
        return DB::select("SELECT * FROM warehouses");
    }
    static function store($date, $id_admin, $id_warehouse)
    {
        return DB::table('importgoods')->insert([
          
            'id_admin' => $id_admin,
            'id_warehouse' => $id_warehouse,
            'date' => $date
            
        ]);
    }
    // static function update($id, $date,$id_admin,$id_warehouse)
    // {

    //     return DB::update("UPDATE importgoods SET   id_admin='$id_admin',id_warehouse='$id_warehouse',date='$date', WHERE id='$id'");
    // }
    static function destroy($id)
    {
        return DB::delete("DELETE FROM detail WHERE id='$id'");
    }
    
}

