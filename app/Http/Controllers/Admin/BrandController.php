<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BrandController extends Controller
{
    //
    public function indexBrands(){
        $data = array(
            'brands' => DB::table('brands')->get()
        );
        return view('backend.brands.index',$data);
    }
    
    public function addBrands(Request $request){
        $query = DB::table('brands')->insert([ 'name' => $request->input('name_brands')]);
        if ($query) {
            return back()->with('message','Data have been successfully inserted');
        } else {
            return back()->with('message','Something went wrong');
        }
        
    }
    
    public function editBrands($id ) {
        $row = DB::table('brands')->where('id',$id)->first();
        $data = array('info'=> $row);
        return view('backend.brands.edit',$data);
    }
    
    public function updateBrands(Request $request){
        $query = DB::table('brands')->where('id', $request->input('id'))->update([ 'name' => $request->input('name_brands')]);
        return redirect('/admin/brand');
    }
    
    public function deleteBrands($id) {
        $delete = DB::table('brands')->where('id', $id)->delete();
        return redirect('/admin/brand');
    }
}