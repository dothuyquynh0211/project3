<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::all();
        return view('backend.product.index_product')->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = array(
            'brands' => DB::table('brands')->get(),
            'categories' => DB::table('categories')->get(),
            'sizes' => DB::table('sizes')->get(),
            'colors' => DB::table('colors')->get(),
        );
        return view('backend.product.add_product', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('image/', $imageName));
            $product = new Product([
                'name' => $request->name,
                'sku' => $request->sku,
                'price' => $request->price,
                'image' => $imageName,
                'description' => $request->description,
                'create' => date("Y-m-d H:i:s"),
                'status' => $request->status ? '1' : ' 0',
                'id_brand' => $request->brand,
                'id_category' => $request->category,
                'id_size' => $request->size,
                'id_color' => $request->color,
            ]);
            $product->save();
        }
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName = time() . '-' . $file->getClientOriginalName();
                $request['id_product'] = $product->id;
                $request['url'] = $imageName;
                $file->move(public_path('gallery/', $imageName));
                Image::create($request->all());
            }
        }
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}