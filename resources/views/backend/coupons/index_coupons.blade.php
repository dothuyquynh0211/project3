@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <a href="/admin/coupons/add">Thêm mã </a> 
            </header>
            <div>
                <div class="form-group">
                    <label>Danh sách   </label>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th> Mã</th>
                        <th> Tên mã</th>
                        <th> Giá trị </th>
                        <th> Mã code </th>
                        <th> Số lần sử dụng </th>
                        <th> Trạng thái</th>
                        <th> Ngày bắt đầu</th>
                        <th> Ngày kết thúc </th>
                        <th> Action </th>
                    </thead>
                    <tbody>

                        @foreach ($list as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->value}}</td>
                            <td>{{$item->coupons_code}}</td>
                            <td>{{$item->coupons_number}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/admin/coupons/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/admin/coupons/edit/{{$item->id}}" class="btn btn-primary btn-xs ">Edit</a>
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
