@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <a href="/admin/product/create">Thêm sản phẩm </a>
                </header>
                <div>
                    <div class="form-group">
                        <label>Danh sách </label>
                    </div>
                    <table class="table table-hover" id="userTable">
                        <thead>
                            <th> Mã</th>
                            <th> Ảnh</th>
                            <th> Tên </th>
                            <th> SKU </th>
                            <th> Giá</th>
                            <th> Action </th>
                        </thead>
                        <tbody>
{{-- test --}}
 {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
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
 --}}
{{-- test
                            @foreach ($product as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                <img src="../image/{{$item->image}}" alt="" style="max-width:100px; max-height:100px">
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
                                    
                                    <a href="/admin/product/edit/{{$item->id}}" class="btn btn-primary btn-xs ">Edit</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach --}}
                        </tbody>
                    </table>
                </div>

            </section>

        </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ asset('admin/product/get-product') }}',
            pageLength:5,
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
            columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'image',
                    name: 'Ảnh',
                    render: (data, type, row, meta) => {
                        return `<img src="../image/${data}" alt="" style="max-width:100px; max-height:100px">`
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                    searching:true,
                },
                {
                    data: 'sku',
                    name: 'sku',
                },
                {
                    data: 'price',
                    name: 'price',
                },
                {
                    data: 'id',
                    name: 'Action',
                    render: (data, type, row, meta) => {
                        return `<div class='btn-group'>
                                    <form action="/admin/product/delete/${data}" method="post">
                                        <a href="/admin/product/detail/${data}" class="btn btn-danger btn-xs ">Detail </a>
                                        <button type="submit" onclick=" return confirm('are you sure')" class="btn btn-primary btn-xs">Delete</button>
                                        @csrf
                                        @method('delete')
                                    <a href="/admin/product/edit/${data}" class="btn btn-primary btn-xs ">Edit</a>
                                    </form>                                   
                                </div>`
                    }
                },

            ]
        });
    </script>
    {{--  --}}
</div>
@endsection



