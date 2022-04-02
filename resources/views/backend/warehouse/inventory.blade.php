@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')

@section('content')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css" />
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div>
                    <div class="form-group">
                        <label>Danh sách </label>
                    </div>
                    <table class="table table-hover" id="student_tbl">
                        <thead>
                            <th> Mã</th>
                            <th> Tên sản phẩm</th>
                            <th> Số lượng</th>
                            <th>Số lượng bán</th>
                            <th> Số lượng tồn</th>
                        </thead>
                        <tbody>

                            @foreach ($data as $item)
                                <?php
                                //dd($item);
                                ?>
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>

                                    <td>{{ $item->quantity_import }}</td>
                                    <td>{{ $item->quantity_invoice }}</td>
                                    <td>{{ $item->product_inventory }}</td>
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
