@extends('master')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/">Women’s </a>
                        <span>Essential structured blazer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="/image/{{ $product->image }}" alt="">
                            </a>
                            <?php $a = 1; ?>
                            @foreach ($image as $image)
                                <a class="pt" href="#product-{{ ++$a }}">
                                    <img src="/gallery/{{ $image->url }}" alt="">
                                </a>
                            @endforeach

                            {{-- <a class="pt" href="#product-2">
                                <img src="img/product/details/thumb-2.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="img/product/details/thumb-3.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-4">
                                <img src="img/product/details/thumb-4.jpg" alt="">
                            </a> --}}
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="{{ $product->image }}" class="product__big__img"
                                    src="/image/{{ $product->image }}" alt="">
                                @foreach ($image as $item)
                                    {{-- dd($image->id); --}}
                                    <img data-hash="{{ $image->id }}" class="product__big__img"
                                        src="/gallery/{{ $image->id }}" alt="">
                                @endforeach
                                {{-- <img data-hash="product-2" class="product__big__img" src="img/product/details/product-3.jpg" alt="">
                                <img data-hash="product-3" class="product__big__img" src="img/product/details/product-2.jpg" alt="">
                                <img data-hash="product-4" class="product__big__img" src="img/product/details/product-4.jpg" alt=""> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}<span>Brand: {{ $attr_product->brand_name }}</span>
                            {{-- <span>ID: {{ $product->sku }}</span> --}}
                        </h3>

                        {{-- <h3>Essential structured blazer <span>Brand: SKMEIMore Men Watches from SKMEI</span></h3> --}}
                        {{-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> $attr_product->brand_name
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div> --}}

                        {{-- <div class="product__details__price">$ 75.0 <span>$ 83.0</span></div> --}}

                        <div class="product__details__price">{{ number_format($product->price, 0, ',', '.') }}đ
                            <?php if ($product->sale_price > 0) {
                                echo '<span>' . number_format($product->sale_price, 0, ',', '.') . ' đ </span>';
                            } ?>
                        </div>

                        <form method="POST" action="/shop_cart">
                            {{ csrf_field() }}
                            <div class="product__details__button">
                                <div class="quantity">
                                    <span>Quantity:</span>
                                    <div class="pro-qty">
                                        <span class="dec qtybtn" onclick="quantityCart(this)">-</span>
                                        <input name="qty" type="text" value="1" readonly id="quantity">
                                        <input type="hidden" name="productid_hidden" value="{{$product->id }}">
                                        <span class="inc qtybtn" onclick="quantityCart(this) ">+</span>
                                    </div>
                                </div>

                                <button type="submit" class="cart-btn add_cart" onclick="sweetalert2()"><span class="icon_bag_alt"></span> Add to
                                    cart</button>

                                <ul>
                                    <li><a href="/wishlist"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                                </ul>
                            </div>
                        </form>

                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    {{-- <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> --}}
                                    <span>Availability:</span>
                                    <p>In Stock</p>
                                </li>
                                <li>
                                    <span>Available color:</span>
                                    <div class="color__checkbox">
                                        {{-- <label for="red">
                                            <input type="radio" name="color__radio" id="red" checked>
                                            <span class="checkmark"></span>
                                        </label> 
                                        <label for="black">
                                            <input type="radio" name="color__radio" id="black">
                                            <span class="checkmark black-bg"></span>
                                        </label> --}}
                                        <label for="grey">
                                            <input type="radio" name="color__radio" id="grey">
                                            <span class="checkmark grey-bg "
                                                style="background: {{ $attr_product->name_color }}"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                        <label for="xs-btn" class="active">
                                            {{-- <input type="radio" id="xs-btn"> --}}
                                            {{ $attr_product->size_name }}
                                        </label>
                                        {{-- <label for="s-btn">
                                            <input type="radio" id="s-btn">
                                            s
                                        </label>
                                        <label for="m-btn">
                                            <input type="radio" id="m-btn">
                                            m
                                        </label>
                                        <label for="l-btn">
                                            <input type="radio" id="l-btn">
                                            l
                                        </label> --}}
                                    </div>
                                </li>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                            </li> --}}

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Mô tả </h6>
                              {{ $product->description }} 
                                
                            </div>
                            {{-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Specification</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                    consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                    quis, sem.</p>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                @foreach ($product_related as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ '/image/' . $item->image }}">
                                <div class="label new">New</div>
                                <ul class="product__hover">
                                    <li><a href="/image/{{ $item->image }}" class="image-popup"><span
                                                class="arrow_expand"></span></a></li>
                                    <li><a href="/wishlist"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="/product-detail/{{ $item->id }}"><span
                                                class="icon_bag_alt"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="/product-detail/{{ $item->id }}">{{ $item->name }}</a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">{{ number_format($item->price, 0, ',', '.') }} đ
                                    <?php if ($item->sale_price > 0) {
                                        echo '<span>' . number_format($item->sale_price, 0, ',', '.') . ' đ </span>';
                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.css">
    <script>
        function sweetalert2(){
            Swal({
                title: 'Thêm giỏ hàng thành công',
                text: 'Do you want to continue',
                type: 'success',
                confirmButtonText: 'Cool'
            })
        }
    </script>
@endsection
