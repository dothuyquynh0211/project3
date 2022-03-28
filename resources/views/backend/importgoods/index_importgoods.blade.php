@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <a href="/admin/importgoods/add">Thêm sản phẩm  </a> 
            </header>
            <div>
                <div class="form-group">
                    <label>Danh sách   </label>
                </div>
                <table class="table table-hover" id="student_tbl">
                    <thead>
                        <th> Mã</th>
                        <th> Ngày</th>
                        <th> Tên người nhập</th>
                        <th> Kho</th>
                      
                        <th> Action </th>
                    </thead>
                    <tbody>

                        @foreach ($list as $item)
                      
                        <tr>
                            <td>{{$item->id}}</td>
                           
                            <td>{{$item->date}}</td>
                            
                            <td>{{$item->name_admin}}</td>
                            <td>{{$item->address}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/admin/detail/{{$item->id}}" class="btn btn-danger btn-xs ">Detail </a>
                                    <a href="/admin/importgoods/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/admin/importgoods/detail/{{ $item->id }}"
                                        class="btn btn-primary btn-xs ">detail</a>
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
