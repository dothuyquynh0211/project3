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
                        <th>Discount</th>
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
                            <td class="cart__price">{{ number_format($v_content->price, 0, ',', '.') }}đ
                                <input hidden value="<?= $v_content->price ?>" class="content-price" />

                            </td>
                            <td class="cart__price">
                                {{ number_format($v_content->options->discount, 0, ',', '.') }}đ
                                <input hidden value="<?= $v_content->options->discount ?>"
                                    class="content_discount_price" />

                            </td>

                            <td class="cart__quantity">
                                <form method="POST" action="/updateCart">
                                    <div class="pro-qty">
                                        <span class="dec qtybtn" onclick="quantityCart(this)">-</span>
                                        <input type="text" value="{{ $v_content->qty }}" name="qty" id="qty" readonly>
                                        <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart"
                                            class="form-control">
                                        {{-- //  <button type="submit" name="update_qty" value="cập nhật"><span class="icon_loading"></span> </button> --}}
                                        <span class="inc qtybtn" onclick="quantityCart(this) ">+</span>
                                    </div>
                                </form>
                            </td>
                            <td class="cart__total">
                                <span class="price-total-number">
                                    <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    if ($v_content->options->discount > 0) {
                                        $subtotal = $v_content->options->discount * $v_content->qty;
                                    }
                                    echo number_format(round($subtotal), 0, ',', '.');
                                    ?>
                                </span>
                                <span>đ</span>
                            </td>
                            <td class="cart__close" onclick="deleteCart('{{ $v_content->rowId }}',this)">

                                <span class="icon_close">
                                </span>

                            </td>
                        </tr>
                        {{-- ======= thuy --}}
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="cart__btn">
            <a href="/">Continue Shopping</a>
        </div>

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
            <form method="get" action="/check-coupons">
                <input type="text" name="coupons" placeholder="Enter your coupon code">
                <button type="submit" class="site-btn">Apply</button>
            </form>

        </div>
        <div class="discount_list">
            <h5>Danh sách mã</h5>
            <div class="discount_content discount_header">
                <div class="discount_check">
                </div>
                <div class="discount_code">Mã code</div>
                <div class="discount_condition">Điều kiện giảm </div>
                <div class="discount_value">Giá trị giảm </div>
                <div class="discounted">Mã gỉam được </div>
            </div>
            <div class="discount_list_content">

                @foreach ($coupon as $items)
                    @if (isset($items[0]))
                        <div class="discount_product">{{ $items[0]->product_name }}</div>
                        @foreach ($items as $item)
                            <?php
                            $discounted = $item->coupons_condition == 1 ? ($item->price * $item->value) / 100 : $item->coupons_condition;
                            
                            ?>
                            <div class="discount_content">
                                <div class="discount_check">
                                    <input type="radio" value="{{ $item->price - $discounted }}"
                                        product_id="{{ $item->id_product }}"
                                        coupons_code="{{ $item->coupons_code }}"
                                        name="discount_radio_{{ $item->id_product }}" onclick="discountCheck(this)"
                                        <?= checkedCoupon($item->id_product, $item->coupons_code) ?>>
                                </div>
                                <div class="discount_code" coupons_code="{{ $item->coupons_code }}">
                                    {{ $item->coupons_code }}</div>
                                <div class="discount_condition">
                                    {{ $item->coupons_condition == 1 ? 'Percent' : 'Fixed' }} </div>
                                <div class="discount_value">{{ $item->value }}</div>
                                <div class="discounted">
                                    {{ $discounted }}
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    <?php
    
    function checkedCoupon($produtId, $couponCode)
    {
        $couponCheck = Session::get('couponCheck');
        if (getType($couponCheck) == 'array') {
            foreach ($couponCheck as $key => $value) {
                if ($value['couponCode'] == $couponCode && $value['productId'] == $produtId) {
                    return 'checked';
                }
            }
        }
    }
    // echo '<pre>';
    // print_r(Cart::content());
    // echo '</pre>';
    ?>
    <div class="col-lg-4 offset-lg-2">
        <div class="cart__total__procced">
            <h6>Cart total</h6>
            <ul>

                <li>Subtotal
                    <span class="total-cart">{{ Cart::subtotal(0, ',', '.') }}đ</span>
                </li>
                <li>
                    <?php
                    $disc_total = '';
                    if (gettype(Session::get('discount_total')) == 'array') {
                        if (isset(Session::get('discount_total')[0])) {
                            $disc_total = Session::get('discount_total')[0];
                        }
                    } else {
                        $disc_total = Session::get('discount_total');
                    }
                    // print_r(Session::get('total'))
                    ?>
                    Discount :
                    <span>{{ number_format($disc_total, 0, ',', '.') }}đ</span>
                </li>
                <?php
                $total = '';
                if (gettype(Session::get('total')) == 'array') {
                    if (isset(Session::get('total')[0])) {
                        $total = Session::get('total')[0];
                    }
                } else {
                    $total = Session::get('total');
                }
                // print_r(Session::get('total'))
                ?>
                {{-- <li>Total <span>đ</span></li> --}}
                <li>Total <span>{{ number_format($total, 0, ',', '.') }}đ</span></li>
            </ul>
            <a href="/checkout" class="primary-btn">Thanh toán</a>

        </div>
    </div>
</div>
