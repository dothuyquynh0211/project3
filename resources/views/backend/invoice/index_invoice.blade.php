@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                {{-- <header class="panel-heading">
                <a href="/admin/product/create">Thêm sản phẩm  </a> 
            </header> --}}
                <div>
                    <div class="form-group">
                        <label>Danh sách hoá đơn </label>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <th> Mã</th>
                            <th> Tên khách hàng</th>
                            <th> Địa chỉ</th>
                            <th> Thành tiền </th>
                            <th> Trạng thái</th>
                            <th> Ngày tạo </th>
                        </thead>
                        <tbody id="invoice_table">

                        </tbody>
                    </table>
                </div>

            </section>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function handleUpdate(id, status) {
            // console.log(id);
            var answer = null;
            switch (status) {
                case 0:
                    answer = confirm('Bạn có muốn huỷ đơn không ?');
                    break;
                case 2:
                    answer = confirm('Bạn muốn duyệt đơn ');
                    break;
                default:
                    break;
            }
            if (!answer) {
                return false;
            }
            $.ajax({
                url: `/admin/invoice/update/${id}/${status}`,
                type: "get",
            }).done(function(ketqua) {
                $('#invoice_table').html(ketqua);
            });
        }

        $.ajax({
            url: `/admin/invoice/update/0/0`,
            type: "get",
        }).done(function(ketqua) {
            $('#invoice_table').html(ketqua);
        });
    </script>
@endsection
