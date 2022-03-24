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
            <form action="/invoice" class="checkout__form" method="POST" >
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p> Name <span>*</span></p>
                                    <input type="text" name="receiver">
                                </div>
                            </div>
                            
                           
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phương thức thanh toán <span>*</span></p>
                                    <input type="text" name="payment_method">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Địa chỉ <span>*</span></p>
                                    <input type="text" name="address">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Tài khoản <span>*</span></p>
                                    @foreach ($users as $users)
                                    <option value="{{$users->id}}">{{$users->name}}</option>
                                @endforeach
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>NOTE <span>*</span></p>
                                    <textarea name="note"></textarea>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="checkout__form__input">
                                    Đang đặt<input type="radio" name="stt" value="1">
                                    
                                    
                                </div>
                            </div>

                            <div class="col-lg-12">
                                
                                    
                                                              
                                </div>
                            </div>
                        </div>
                      
                         <div class="col-lg-4">
                            <?php 
                     
                            $content=Cart::content();
                            // echo '<pre>';
                            //     print_r($content);
                            //     echo '</pre>';
                                ?> 
                            <div class="checkout__order">
                           
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                  
                                    <ul>
                                        <li>
                                            <span class="top__text">Product   x   quantity</span>
                                            
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        @foreach ($content as $v_content)
                                        <li>{{$v_content->name}}<br>x{{$v_content->qty}}<span><?php 
                                            $subtotal= $v_content->price*$v_content->qty;
                                            echo number_format($subtotal).''.'VND';
                                            ?></span></li>
                                            @endforeach
                                    </ul>
                            
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span>{{Cart::subtotal().''.'VNĐ'}}</span></li>
                                        {{-- <li>Total <span>$ 750.0</span></li> --}}
                                    </ul>
                                </div>
                            
                                <div class="checkout__order__widget">
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
                                </div>
                                <button type="submit" class="site-btn">Place oder</button>
                            
                            
                            
                           
                        </div>
                        </div>
                    
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->
@endsection