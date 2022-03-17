<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    function index(){
        $cate_product = DB::table('categories')->get();
        return view('frontend.index')->with('category',$cate_product);
    }
    
    public function checkout(){
        return view('frontend.checkout');        
    }
    
    public function cart(){
        return view('frontend.shop_cart');        
    }
    
    public function category(){
        return view('frontend.shop');
    }

    public function contact(){
        return view('frontend.contact');
    }
    public function productDetail(){
        return view('frontend.product_details');        
    }
}