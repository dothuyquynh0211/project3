@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <a href="/admin/coupons/add">Thêm mã </a>
                </header>
                <div>
                    <div class="form-group">
                        <label>Danh sách </label>
                    </div>
                    <table class="table table-hover" id="student_tbl">
                        <thead>
                            <th> Mã</th>
                            <th> Tên mã</th>
                            <th> Giá trị </th>
                            <th> Mã code </th>
                            <th> Số lần sử dụng </th>
                            <th> Mục đích mã </th>
                            <th> Trạng thái</th>
                            <th> Ngày bắt đầu</th>
                            <th> Ngày kết thúc </th>
                            <th>Hết hạn </th>
                            <th> Action </th>
                        </thead>
                        <tbody>

                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->value }}</td>
                                    <td>{{ $item->coupons_code }}</td>
                                    <td>{{ $item->coupons_number }}</td>
                                    <td>{{ $item->coupons_condition ? 'Giảm theo %' : 'Giảm cố định' }}</td>
                                    <td>{{ $item->status ? 'Hoạt động' : 'Ngừng hoạt động' }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>
                                        @if ($item->end_date < $today)
                                            
                                            <span>Đã hết hạn </span>
                                        @else
                                            <span>Còn hạn </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class='btn-group'>
                                            <a href="/admin/coupons/delete/{{ $item->id }}"
                                                class="btn btn-danger btn-xs ">Delete </a>
                                            <a href="/admin/coupons/edit/{{ $item->id }}"
                                                class="btn btn-primary btn-xs ">Edit</a>
                                            <a href="/admin/coupons/detail/{{ $item->id }}"
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
