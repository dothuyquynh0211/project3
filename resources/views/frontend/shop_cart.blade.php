@extends('master')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
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
                    <?php
                    
                    $content = Cart::content();
                    // echo '<pre>';
                    //     print_r($content);
                    //     echo '</pre>';
                    ?>
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $v_content)
                                    <tr rowId={{ $v_content->rowId }}>
                                        <td class="cart__product__item">
                                            <img src="/image/{{ $v_content->options->image }}" alt=""
                                                style="max-height:100px; max-width:100px">
                                            <div class="cart__product__item__title">
                                                <h6> {{ $v_content->name }}</h6>
                                                <h6> {{ $v_content->sku }}</h6>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                        </td>

                                        <td class="cart__price">{{ number_format($v_content->price) }}VNĐ
                                            <input hidden value="<?= $v_content->price ?>" class="content-price" />

                                        </td>

                                        <td class="cart__quantity">
                                            <form method="POST" action="/updateCart">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $v_content->qty }}" name="qty">
                                                    <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart"
                                                        class="form-control">
                                                    {{-- //  <button type="submit" name="update_qty" value="cập nhật"><span class="icon_loading"></span> </button> --}}
                                                </div>
                                            </form>
                                        </td>
                                        <td class="cart__total">
                                            <span class="price-total-number"><?php
$subtotal = $v_content->price * $v_content->qty;
echo number_format($subtotal);
?></span>

                                            <span>vnd</span>
                                        </td>
                                        <td class="cart__close" onclick="deleteCart('{{ $v_content->rowId }}',this)">

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
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                    {{-- <form action="/test" method="get">
                        @csrf
                        <div class="cart__btn">
                            <button type="submit">Update Cart</button>

                        </div>
                    </form> --}}

                </div>
                {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                     <button type="submit" name="update_qty" value="cập nhật"><span class="icon_loading"></span> Update cart</button>
                    </div>
                </div> --}}
            </div>






            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>0</span></li>
                            <li>Total <span class="total-cart">{{ Cart::total() . '' . 'VND' }}</span></li>
                        </ul>
                        <a href="frontend.checkout/" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </section>
@endsection
