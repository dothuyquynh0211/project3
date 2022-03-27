@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
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
                <table class="table table-hover" id="student_tbl">
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
                                        <button type="submit" onclick=" return confirm('are you sure')" class="btn btn-primary btn-xs">Delete</button>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script>
    $(document).ready( function () {
    $('#student_tbl').DataTable();
} );
    </script>
@endsection



