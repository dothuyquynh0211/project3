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
                    <table class="table table-hover" id="useTable">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
    $('#userTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ asset('admin/product/get-product') }}',
        pageLength:5,

        columns: [{
                data: 'id',
                name: 'id'
            }, {
                data: 'image',
                name: 'Anh',
                render: (data, type, row, meta) => {
                    return `<img src="../image/${data}" alt="" style="max-width:100px; max-height:100px">`
                }
            },
            {
                data: 'name',
                name: 'Ten',
                searching:true,
            },
            {
                data: 'sku',
                name: 'SKU',
            },
            {
                data: 'price',
                name: 'Gia',
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
@endsection
