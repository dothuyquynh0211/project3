@extends('backend.layout.master')
@section('title','Trang chủ Admin')
@section('style')

@endsection
@section('content')
{{-- <style>
    .color-wrap {
        display: flex;
    }
.color-content {
    margin-right: 15px;
    list-style: none;
}
.color {
    width: 0!important ;
    height: 0!important;
    margin: 30px;
    display: block;
    position: relative;
    cursor: pointer;
}
.color::after {
    content: "";
    display: block;
    width: 60px;
    height: 60px;
    top: 0;
    left: 0;
    position: absolute;
    color: attr(data-color);
    transform: translate(-50%, -50%);
}   

.color:checked::after {
    background-color: green;
}
</style> --}}
<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm 
            </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
            <div class="panel-body">

                <div class="position-center">
                    <form role="form" action="/admin/product/update/{{$products->id}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên sản phẩm  </label>
                        <input type="text" name="name" class="form-control"  placeholder="Tên sản phẩm " value="{{$products->name}}">
                    </div>                                     
                    <div class="form-group">
                        <label> SKU</label>
                        <input type="text" name="sku" class="form-control"  value="{{$products->sku}}">
                    </div>
                    <div class="form-group">
                        <label>Price  </label>
                        <input type="text" name="price" class="form-control"  placeholder=" 300000 " value="{{$products->price}}">
                    </div>
                    <div class="form-group">
                        <label>Description </label>
                        <input type="text" name="description" class="form-control"  placeholder=" 300000 " value="{{$products->description}}">
                    </div>
                    <div class="form-group">
                        <label> Image </label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image Gallery </label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <label>Status </label>
                        <input type="radio" name="status">
                    </div>             
                    <div class="form-group">
                        <label>Brand </label>
                        <select name="brand" id="brand">
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="category" id="category">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Size</label>                        
                        <select name="size" id="size">
                            @foreach ($sizes as $size)
                                <option value="{{$size->id}}">{{$size->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="display: flex">
                        <label>Color</label>                        
                        {{-- <select name="color" id="color"> --}}
                            {{-- <option value="" >-- chon mau --</option> --}}
                            {{-- <ul class="color-wrap"> --}}
                            @foreach ($colors as $color)
                            {{-- <li class="color-content"> --}}
                            <div class="checkbox-color">
                                <input type="checkbox" name="color"  class="color" data-color="red" value="{{$color->id}}" style="background:{{$color->name}};width: 30px;height: 30px;" > 
                            {{-- </input> --}}
                            </div>
                                {{-- <option value="{{$color->id}}" >
                                    <i style="background-color:{{$color->name}};width: 30px;height: 30px;" > </i>        
                                </option> --}}
                            {{-- </li> --}}
                            @endforeach
                            {{-- </ul> --}}
                        {{-- </select> --}}
                    </div>
                    <button type="submit" name="add_account" class="btn btn-info">Thêm tài khoản  </button>
                    </form>
                    <br>
                </div>
            </div>
        </section>

    </div>
    <div class="col-lg-6">
        <div class="image-cover">
            <p>Image</p>
            <img src="/image/{{$products->image}}" alt="" style="max-height: 300px; max-width:300px">
            <form action="/deleteimage/{{$products->id}}" method="post">
                <button type="submit">x</button>
                @csrf
                @method('delete')
            </form>
        </div>
        <div class="image-gallery">
            <p>Gallery</p>
            @foreach ($images as $img)
                <img src="/gallery/{{$img->url}}" alt="" style="max-height: 200px; max-width:200px">
                <form action="/deletegallery/{{$img->id}}" method="post">
                    <button type="submit">x</button>
                    @csrf
                    @method('delete')
                </form>
            @endforeach
        </div>
        
    </div>
</div>
@endsection
