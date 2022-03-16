<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SizeController extends Controller
{
    //
    public function indexSizes(){
        $data = array(
            'sizes' => DB::table('sizes')->get()
        );
        return view('backend.sizes.index',$data);
    }
    
    public function addSizes(Request $request){
        $query = DB::table('sizes')->insert([ 'name' => $request->input('name_sizes')]);
        if ($query) {
            return back()->with('message','Data have been successfully inserted');
        } else {
            return back()->with('message','Something went wrong');
        }
        
    }
    
    public function editSizes($id ) {
        $row = DB::table('sizes')->where('id',$id)->first();
        $data = array('info'=> $row);
        return view('backend.sizes.edit',$data);
    }
    
    public function updateSizes(Request $request){
        $query = DB::table('sizes')->where('id', $request->input('id'))->update([ 'name' => $request->input('name_sizes')]);
        return redirect('/admin/size');
    }
    
    public function deleteSizes($id) {
        $delete = DB::table('sizes')->where('id', $id)->delete();
        return redirect('admin/size');
    }

}