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
                    <div class="form-group">
                        <form action="" method="post">
                            <input type="date" name="date">
                            <input type="date" name="date">
                            <button type="submit">Lọc </button>
                        </form>
                    </div>
                    <table class="table table-hover" id="student_tbl">
                        <thead>


                            <th> Mã hoá đơn </th>
                            <th> Ngày đặt  </th>
                            <th>Thông tin người nhận </th>
                            <th>Tổng tiền </th>
                        </thead>
                        <tbody>


                            @foreach ($invoice as $item  )
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->receiver }}, {{$item ->address}}</td>
                                <td>{{$item->total_payment}}</td>
                            </tr>

                            @endforeach
                            


                        </tbody>
                    </table>
                </div>
                <h5> Tổng giá nhập : {{ number_format($total_import) . ' ' . 'VNĐ' }} </h5>
                <h5> Tổng giá bán : {{ number_format($total_invoice) . ' ' . 'VNĐ' }} </h5>
                <h5>Lợi nhuận : 
                    <?php
                    $profit = $total_invoice - $total_import;
                    echo number_format("$profit") . 'VNĐ';
                    ?>
                </h5>
            </section>

        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script>
        $(document).ready(function() {
            $('#student_tbl').DataTable();
        });
    </script>
@endsection
