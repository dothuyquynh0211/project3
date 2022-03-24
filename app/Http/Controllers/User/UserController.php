<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    function index()
    {
        $product = DB::table('products')->paginate(8);
        // view()->share('category', $cate_product);
        return view('frontend.index')->with('products', $product);
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function cart()
    {
        return view('frontend.shop_cart');
    }

    public function category()
    {
        $cate_product = DB::table('categories')->get();
        return view('frontend.shop')->with('category', $cate_product);
    }

    public function contact()
    {
        // dd('bug');
        return view('frontend.contact');
    }
    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        $image = Image::where('id_product', $product->id)->get();
        $attr_product = Product::join('brands', 'brands.id', '=', 'products.id_brand')
        ->join('categories', 'categories.id', '=', 'products.id_category')
        ->join('sizes', 'sizes.id', '=', 'products.id_size')
        ->join('colors', 'colors.id', '=', 'products.id_color')      
        ->where('products.id',$product->id)
        ->get(['products.*', 'brands.name as brand_name','colors.name as name_color','categories.name as category_name','sizes.name as size_name'])->first();
        return view('frontend.product_details')->with('product', $product)->with('image', $image)->with('attr_product', $attr_product);
    }
}