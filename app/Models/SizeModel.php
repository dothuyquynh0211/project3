<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SizeModel 
{
   
    use HasFactory;
    static function index(){
        return DB:: select("SELECT * FROM  sizes");
    }
    
    static function get($id){
        return DB::select("SELECT * FROM sizes WHERE id='$id'");
        
    }
   
    static function store($name){
    return DB::insert("INSERT INTO sizes VALUES(NULL,'$name')");
    }
    static function update($id,$name){
       
      return DB::update("UPDATE sizes SET  name ='$name' WHERE id='$id'");
    }
    static function destroy($id){
        return DB::delete("DELETE FROM sizes WHERE id='$id'");
    }
}
