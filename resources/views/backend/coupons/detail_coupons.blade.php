@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <a href="/admin/coupons/add">Chi tiết mã</a>
                </header>
                <div>
                    <div class="form-group">
                        <label>Danh sách </label>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <th> Mã</th>
                            <th> Tên sản phẩm </th>
                            <th> Ảnh</th>
                            <th>Giá</th>
                            <th>Giá khi áp mã</th>
                        </thead>
                        <tbody>

                            @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img src="/image/{{ $item->image }}" alt=""
                                            style="max-width:100px; max-height:100px">
                                    </td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </section>

        </div>
    </div>
@endsection
