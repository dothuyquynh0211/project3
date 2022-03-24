<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function save_cart(Request $request){
    
       $quantity =$request->qty;
        $productId=$request->productid_hidden;
        $product_Inf = DB::table('products')->where('id',$productId)->first();
        // $brands = DB::table('brands')->get();
        // $categories = DB::table('categories')->get();
    // //    Cart::add('293ad', 'Product 1', 1, 9.99, 550);
      //Cart::destroy();
    $data['id']= $product_Inf->id;
    $data['name']= $product_Inf->name;
    $data['qty']= $quantity;
    $data['price']= $product_Inf->price;
    $data['weight']= $product_Inf->price;
    $data['options']['image']= $product_Inf->image;
    
        Cart::add($data);
         return redirect('/shop_cart');
    }
    public function shop_cart(){
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();
        return view('frontend.shop_cart')->with('categories',$categories)->with('brands',$brands);
     
    }
    public function deleteCart($rowId){
        Cart::update($rowId,0);
        return redirect('/shop_cart');
    }
}