<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $data = array(
            'list' => DB::table('categories')->get()
        );
        return view('backend.category.index_category',$data);
    }
    
    public function add(Request $request){
        $query = DB::table('categories')->insert([ 'name' => $request->input('name_category')]);
        if ($query) {
            return back()->with('message','Data have been successfully inserted');
        } else {
            return back()->with('message','Something went wrong');
        }
        
    }
    
    public function edit($id ) {
        $row = DB::table('categories')->where('id',$id)->first();
        $data = array('info'=> $row);
        return view('backend.category.edit_category',$data);
    }
    
    public function update(Request $request){
        $query = DB::table('categories')->where('id', $request->input('id'))->update([ 'name' => $request->input('name_category')]);
        return redirect('/admin/category');
    }
    
    public function delete($id) {
        $delete = DB::table('categories')->where('id', $id)->delete();
        return redirect('/admin/category');
    }
}