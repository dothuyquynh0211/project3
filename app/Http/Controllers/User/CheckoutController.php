<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //
    public function Checkout(){
        $data = array(
            'users' => DB::table('users')->get(),
            'admins' => DB::table('admins')->get(),
            
        );
       
        return view('frontend.checkout.checkout',$data);
    }
    public function Save_Checkout(Request $request){
        // $invoice = new invoice ([
        //     'name' => $request->name,
        //     'sku' => $request->sku,
        //     'price' => $request->price,
            
        //     'description' => $request->description,
        //     'create' => date("Y-m-d H:i:s"),
        //     'status' => $request->status ? '1' : ' 0',
        //     'id_brand' => $request->brand,
        //     'id_category' => $request->category,
        //     'id_size' => $request->size,
        //     'id_color' => $request->color,
        // ]);
        // $invoice->save();


    }
}
