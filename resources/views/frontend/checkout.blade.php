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

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                        here to enter your code.</h6>
                </div>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <form action="/invoice" class="checkout__form" method="POST">
                {{ csrf_field() }}
                <input hidden name="id_user" value="{{ Auth::user()->id }}">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p> Tên người nhận <span>*</span></p>
                                    <input type="text" name="receiver" value="{{ Auth::user()->name }}">
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Điện thoại<span>*</span></p>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Địa chỉ <span>*</span></p>
                                    <input type="text" placeholder="Street Address" name="address"
                                        value="{{ Auth::user()->address }}">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Ghi chú </p>
                                    <input type="text" name="note">

                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    
                    $content = Cart::content();
                    // echo '<pre>';
                    // print_r($content);
                    // echo '</pre>';
                    ?>

                    <div class="col-lg-4">

                        <div class="checkout__order">

                            <h5>Your order</h5>
                            <div class="checkout__order__product">

                                <ul>
                                    <li>
                                        <span class="top__text">Product x quantity</span>

                                        <span class="top__text__right">Total</span>
                                    </li>
                                    @foreach ($content as $v_content)
                                        <li>{{ $v_content->name }}<br>x{{ $v_content->qty }}
                                            <span>
                                                <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                                
                                                if ($v_content->options->discount > 0) {
                                                    echo '<span>' . number_format($v_content->options->discount * $v_content->qty, 0, ',', '.') . '' . 'đ' . '</span>';
                                                    echo '<span style="text-decoration-line: line-through">' . number_format($subtotal, 0, ',', '.') . '' . 'đ' . '</span>';
                                                } else {
                                                    echo '<span>' . number_format($subtotal, 0, ',', '.') . '' . 'đ' . '</span>';
                                                }
                                                ?>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Subtotal <span class="total-cart">{{ Cart::subtotal(0, ',', '.') }}đ</span>
                                    </li>
                                    <li>
                                        <?php
                                        $disc_total = '';
                                        $total = '';
                                        
                                        $disc_total = Session::get('discount_total');
                                        
                                        $total = Session::get('total');
                                        
                                        // print_r(Session::get('total'))
                                        
                                        ?>
                                        Discount :
                                        <span>{{ number_format($disc_total, 0, ',', '.') }}đ</span>
                                    </li>
                                    <?php
                                    
                                    // print_r(Session::get('total'))
                                    ?>

                                    <li>Total <span>{{ number_format($total, 0, ',', '.') }}đ</span></li>
                                </ul>
                            </div>

                            {{-- <div class="checkout__order__widget">
                                <label for="o-acc">
                                    Create an acount?
                                    <input type="checkbox" id="o-acc">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Create am acount by entering the information below. If you are a returing customer
                                    login at the top of the page.</p>
                                <label for="check-payment">
                                    Cheque payment
                                    <input type="checkbox" id="check-payment">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="paypal">
                                    PayPal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            <button type="submit" class="site-btn">Place oder</button>




                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
