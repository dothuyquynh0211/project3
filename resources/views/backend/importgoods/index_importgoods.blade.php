@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <a href="/admin/importgoods/create">Thêm sản phẩm  </a> 
            </header>
            <div>
                <div class="form-group">
                    <label>Danh sách   </label>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th> Mã</th>
                        <th> Ngày</th>
                        <th> Tên người nhập</th>
                        <th> Kho</th>
                      
                        <th> Action </th>
                    </thead>
                    <tbody>

                        @foreach ($importgoods as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                           
                            <td>{{$item->date}}</td>
                            <td>{{$item->admin}}</td>
                            <td>{{$item->warehouse}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/admin/product/detail{{$item->id}}" class="btn btn-danger btn-xs ">Detail </a>
                                    <a href="/admin/product/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a>
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
