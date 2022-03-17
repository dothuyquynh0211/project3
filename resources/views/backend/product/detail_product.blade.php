@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="image">
            <img src="/image/{{$product->image}}" alt="" style="max-height: 300px; max-width:300px" >
        </div>
        <div class="gallery">
            @foreach ($image as $item)
            <img src="/gallery/{{$item->url}}" alt="" style="max-height: 100px; max-width:100px" >            
            @endforeach
        </div>
    </div>
    <div class="col-lg-6">
        <p>name : {{$product->name}}</p>
        <p>sku : {{$product->sku}}</p>
        <p>price : {{$product->price}}</p>
        <p>description : {{$product->description}}</p>
        <p>brand : {{$product->id_brand}}</p>
        <p>category : {{$product->id_category}}</p>
        <p>size : {{$product->id_size}}</p>
        <p>color : {{$product->id_color}}</p>

    </div>
</div>
@endsection