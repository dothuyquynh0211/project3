<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function indexProduct()
    {
        $data = array(
            // 'list' => DB::table('coupons')->get()
        );
        return view('backend.product.index_product', $data);
    }

    public function add()
    {
        $data = array(
            'brands' => DB::table('brands')->get(),
            'categories' => DB::table('categories')->get(),
            'sizes' => DB::table('sizes')->get(),
            'colors' => DB::table('colors')->get(),
        );
        return view('backend.product.add_product', $data);
    }
}