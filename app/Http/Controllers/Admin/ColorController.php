<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ColorController extends Controller
{
    //
    public function indexColors(){
        $data = array(
            'colors' => DB::table('colors')->get()
        );
        return view('backend.colors.index',$data);
    }
    
    public function addColors(Request $request){
        $query = DB::table('colors')->insert([ 'name' => $request->input('name_colors')]);
        if ($query) {
            return back()->with('message','Data have been successfully inserted');
        } else {
            return back()->with('message','Something went wrong');
        }
        
    }
    
    public function editColors($id ) {
        $row = DB::table('colors')->where('id',$id)->first();
        $data = array('info'=> $row);
        return view('backend.colors.edit',$data);
    }
    
    public function updateColors(Request $request){
        $query = DB::table('colors')->where('id', $request->input('id'))->update([ 'name' => $request->input('name_colors')]);
        return redirect('/backend/colors/index');
    }
    
    public function deleteColors($id) {
        $delete = DB::table('colors')->where('id', $id)->delete();
        return redirect('backend/colors/index');
    }

}
