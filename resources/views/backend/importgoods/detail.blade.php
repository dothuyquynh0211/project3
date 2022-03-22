@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <a href="/admin/detail/create">Thêm sản phẩm  </a> 
            </header>
            <div>
                <div class="form-group">
                    <label>Danh sách   </label>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th> Mã</th>
                        <th> Ngày</th>
                       
                        <th>giá nhập</th>
                        <th>tên</th>
                        <th> số lượng</th>
                      
                        <th> Action </th>
                    </thead>
                    <tbody>

                        @foreach ($dt as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                           
                            <td>{{$item->date}}</td>
                            <td>{{$item->cost_price}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                <div class='btn-group'>
                                    
                                    <a href="/admin/importgoods/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/admin/importgoods/edit/{{$item->id}}" class="btn btn-primary btn-xs ">Edit</a>
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
