<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorModel;

class ColorController extends Controller
{
    //
    function indexColor(){
        
        $colors = ColorModel::indexColor();
      
       return view('backend.colors.index',['colors'=>$colors]);
       
    }

   
    function insert(){
        return view('backend.sizes.insert');
    }
    function edit($id){
        $kiemtra = ColorModel::get($id)[0];
        return view('backend.sizes.edit',['kiemtra'=> $kiemtra]);
    
    }
    
    function store(Request $req){
        $name = $req->input('name');
       
        
        $rs = ColorModel::store($name);
        if($rs==0) return "Insert thất bại";
        else{
            return redirect()->route('/index');
        }
    }
    function update(Request $req, $id){
        $name = $req->input('name');
        $rs = ColorModel::update($id,$name);
        if($rs==0) return "Cập nhật thất bại";
        else{
            return redirect('/index'); 
        }
    
    }
    function destroy($id){
      $rs = ColorModel::destroy($id);
      if($rs == 0) return "Xóa thất bại";
        else{
            return redirect('index'); 
        }
    }
}
