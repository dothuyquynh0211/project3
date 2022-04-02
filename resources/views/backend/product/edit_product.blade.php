@extends('backend.layout.master')
@section('title','Trang chủ Admin')
@section('style')

@endsection
@section('content')
<script type="text/javascript" src="{{ asset('/backend/ckeditor/ckeditor.js') }}"></script>

<style>
    .color-choise-group {
        display: flex;
        margin-left: 30px;
    }

    .color-choise {
        position: relative;
        width: 50px;
        height: 50px;
        margin-right: 15px;
    }

    .color-choise:last-child {
        margin-right: 0;
    }

    .color-choise .radio {
        opacity: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        border: 0;
        margin: 0;
        cursor: pointer;
        z-index: 999;
    }

    .color-choise .radio:checked~.radio-span::after {
        background-image: url('/backend/images/check.png');
        background-size: contain;
        background-repeat: no-repeat;
        background-size: 100%;
        position: absolute;
        top: -10px;
        right: -10px;
        content: "";
        z-index: 1;
        width: 100%;
        height: 100%;
    }

    .color-choise .radio-span {
        width: 100%;
        height: 100%;
        background-color: blue;
        display: block;
        position: relative;
    }
</style>
<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Cập nhập sản phẩm 
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
                        <label>Sale price  </label>
                        <input type="text" name="sale_price" class="form-control"  placeholder=" 300000 " value="{{$products->sale_price}}">
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
                        <div class="color-choise-group">
                            @foreach ($colors as $color)

                                <div class="color-choise">
                                    <input type="radio" class="radio" name="color" value="{{$color->id}}">
                                    <span class="radio-span" style="background-color:{{$color->name}} "></span>
                                </div>   
                                @endforeach
                            </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả </label>
                        <textarea name="description" class="form-control" placeholder=" 300000 " id='ckeditor1'></textarea>
                    </div>
                    <button type="submit" name="add_account" class="btn btn-info">Cập nhật </button>
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
<script type="text/javascript">
    CKEDITOR.replace( 'ckeditor1' );
</script>
@endsection
