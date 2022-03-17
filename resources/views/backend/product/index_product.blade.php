@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <a href="/admin/product/create">Thêm sản phẩm  </a> 
            </header>
            <div>
                <div class="form-group">
                    <label>Danh sách   </label>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th> Mã</th>
                        <th> Ảnh</th>
                        <th> Tên </th>
                        <th> SKU </th>
                        <th> Giá</th>
                        <th> Action </th>
                    </thead>
                    <tbody>

                        @foreach ($product as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                <img src="../image/{{$item->image}}" alt="" style="max-width:100px; max-height:100px">
                                {{-- {{$item->image}} --}}
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->sku}}</td>
                            <td>{{$item->price}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/admin/product/detail/{{$item->id}}" class="btn btn-danger btn-xs ">Detail </a>
                                    <form action="/admin/product/delete/{{$item->id}}" method="post">
                                        <button type="submit" onclick=" return confirm('are you sure')">Delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                    {{-- <a href="/admin/product/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a> --}}
                                    <a href="/admin/product/edit/{{$item->id}}" class="btn btn-primary btn-xs ">Edit</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </section>

    </div>
</div>
@endsection
