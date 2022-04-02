@extends('master')
@section('content')
    <style>
        .discount_header {
            font-weight: bold;
        }

        .discount_product {
            font-weight: bold;
            font-size: 20px;

        }

        .discount_content>div {
            width: calc((100% - 20px)/ 4);
        }

        .discount_check {
            width: 20px !important;
        }

        .discount_content {
            display: flex;
            justify-content: space-between;
        }

    </style>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container" id="shop_cart_content">
           
        </div>
    </section>
    </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $.ajax({
        url: "/shop_cart_content",
        type: "get",
    }).done(function (ketqua) {
        switch (ketqua) {
            case "error":
                break;

            default:
                $("#shop_cart_content").html(ketqua);
                break;
        }
        // console.log(ketqua);
    });
    </script>
@endsection
