<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem\File;

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
            $file->move('image/', $imageName);
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
                $imageName = time().'-'.$file->getClientOriginalName();
                $request['id_product'] = $product->id;
                $request['url'] = $imageName;
                $file->move('gallery/', $imageName);
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
        $product = Product::findOrFail($id);
        $image = Image::where('id_product',$product->id)->get();
        // dd($image);
        
        return view('backend.product.detail_product')->with('product',$product)->with('image',$image);
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
        $products = Product::findOrFail($id);
        $image = Image::where('id_product',$products->id)->get();
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();
        $sizes = DB::table('sizes')->get();
        $colors = DB::table('colors')->get();
        // dd($image);
    return view('backend.product.edit_product')
    ->with('products',$products)
    ->with('images',$image)
    ->with('brands',$brands)
    ->with('categories',$categories)
    ->with('sizes',$sizes)
    ->with('colors',$colors);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    //
        $products = Product::findOrFail($id);
        if($request->hasFile('image')){
            if(\Illuminate\Filesystem\Filesystem::exists('image/'.$products->image)){
                \Illuminate\Filesystem\Filesystem::delete('image/'.$products->image);
            }
            $file = $request->file('image');
            $products->image= time() . '-' . $file->getClientOriginalName();
            $file->move('image/', $products->image);
            $request['image']= $products->image;
            
        }
        $products->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price,
            'image' => $products->image,
            'description' => $request->description,
            // 'create' => date("Y-m-d H:i:s"),
            'status' => $request->status ? '1' : ' 0',
            'id_brand' => $request->brand,
            'id_category' => $request->category,
            'id_size' => $request->size,
            'id_color' => $request->color,
            
        ]);
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName = time().'-'.$file->getClientOriginalName();
                $request['id_product'] = $products->id;
                $request['url'] = $imageName;
                $file->move('gallery/', $imageName);
                Image::create($request->all());
            }
        }
        return redirect('/admin/product');
    
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
        $products = Product::findOrFail($id);
        // dd($products);
        if(\Illuminate\Filesystem\Filesystem::exists('image/'.$products->image)){
            \Illuminate\Filesystem\Filesystem::delete('image/'.$products->image);
        }
        $images = Image::where('id_product',$products->id)->get();
        foreach ($images as $image) {
            if(\Illuminate\Filesystem\Filesystem::exists('gallery/'.$image->url)){
                \Illuminate\Filesystem\Filesystem::delete('gallery/'.$image->url);
            }
        $image->delete();
        }

        $products->delete();
        return redirect('/admin/product');
    }
    
    public function deleteGallery($id){
        $image = Image::findOrFail($id);
        // dd($products);
        if(\Illuminate\Filesystem\Filesystem::exists('gallery/'.$image->url)){
            \Illuminate\Filesystem\Filesystem::delete('gallery/'.$image->url);
        }
        Image::find($id)->delete();
        return back();
        return redirect('/admin/product/edit/'.$id);
                
    }

    public function deleteImage($id){
        $product = Product::findOrFail($id);
        // dd($products);
        if(\Illuminate\Filesystem\Filesystem::exists('image/'.$product->image)){
            \Illuminate\Filesystem\Filesystem::delete('image/'.$product->image);
        }
        // Image::find($id)->delete();
        return redirect('/admin/product/edit/'.$id);
                
    }
}