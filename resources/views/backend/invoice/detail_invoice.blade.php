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
                            <th> Ảnh</th>
                            <th> Tên sản phẩm </th>
                            <th> Mã phiếu giảm giá</th>
                            <th> Số lượng</th>
                            <th> Đơn giá</th>
                            <th> Tổng tiền </th>
                        </thead>
                        <tbody id="invoice_table">
                            @foreach ($invoice as $item)
                                <tr>
                                    <td>
                                        <img src="/image/{{ $item->image }}" alt=""
                                            style="max-height: 80px;max-width:80px">
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{ $item->coupons_code }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="total-payment">
                        <h3>Thành tiền : </h3>
                    </div>
                </div>

            </section>

        </div>
    </div>

@endsection
