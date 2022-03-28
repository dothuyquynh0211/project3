@extends('master')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Invoice History</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Mã đơn </th>
                                    <th>Tên</th>
                                    <th>Địa chỉ</th>
                                    <th>Tổng tiền </th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice as $item)
                                    
                                    <tr>
                                        <td class="cart__price">
                                            <h6> {{ $item->id }}</h6>
                                        </td>
                                        <td class="cart__price">
                                            <h6> {{ $item->receiver }}</h6>
                                        </td>
                                        <td class="cart__price">
                                            <h6> {{ $item->address }}</h6>
                                        </td>
                                        <td class="cart__quantity">
                                            <h6>{{ $item->total_payment }}</h6>
                                        </td>
                                        <td class="cart__total">

                                            <h6>{{ $item->status_order }}</h6>
                                        </td>
                                        <td class="cart__total">
                                            <a href="/history/{{$item->id}}"> Chi tiết</a>

                                        </td>
                                        <td class="cart__close">

                                            <span class="icon_close">
                                            </span>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
        </div>
    </section>
    </div>
    </section>
@endsection