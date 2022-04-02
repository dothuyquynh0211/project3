@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <a href="/admin/account/customer/add">Thêm tài khoản </a> 
            </header>
            <div>
                <div class="form-group">
                    <label>Danh sách tài khoản   </label>
                </div>
                <table class="table table-hover" id="student_tbl">
                    <thead>
                        <th> Mã</th>
                        <th> Tên khách hàng  </th>
                        <th> Email </th>
                        <th> Số điện thoại </th>
                        <th> Địa chỉ </th>
                        <th> Action </th>
                    </thead>
                    <tbody>

                        @foreach ($list as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/admin/account/customer/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/admin/account/customer/edit/{{$item->id}}" class="btn btn-primary btn-xs ">Edit</a>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script>
        $(document).ready( function () {
        $('#student_tbl').DataTable();
    } );
        </script>
@endsection
