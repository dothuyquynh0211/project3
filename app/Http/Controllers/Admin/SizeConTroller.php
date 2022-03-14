<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SizeModel;

class SizeConTroller extends Controller
{
    function index(){
        
        $sizes = SizeModel::index();
      
       return view('backend.sizes.index',['sizes'=>$sizes]);
       
    }

   
    function insert(){
        return view('backend.sizes.insert');
    }
    function edit($id){
        $kiemtra = SizeModel::get($id)[0];
        return view('backend.sizes.edit',['kiemtra'=> $kiemtra]);
    
    }
    
    function store(Request $req){
        $name = $req->input('name');
       
        
        $rs = SizeModel::store($name);
        if($rs==0) return "Insert thất bại";
        else{
            return redirect()->route('/index');
        }
    }
    function update(Request $req, $id){
        $name = $req->input('name');
        $rs =SizeModel::update($id,$name);
        if($rs==0) return "Cập nhật thất bại";
        else{
            return redirect('/index'); 
        }
    
    }
    function destroy($id){
      $rs = SizeModel::destroy($id);
      if($rs == 0) return "Xóa thất bại";
        else{
            return redirect('index'); 
        }
    }
}
