@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')

@section('content')
    <style>
        .search_result {
            position: relative;
            display: none;
        }

        .search_result.active {
            /* position: relative; */
            display: block;
        }

        .search_result ul {
            background-color: white;
            list-style-type: none;
            position: absolute;
            top: 100%;
            left: 0;
            padding: 0;

        }

        .search_result li {
            display: flex;
            padding: 10px 20px;
            align-items: center;
            cursor: pointer;
        }

        .search_result li:hover {
            background-color: #bbb;

        }

        .img_search img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 30px;
        }

        .product_search {
            margin-top: 100px;
        }

        #tr_body tr td img {
            max-width: 100px;
            max-height: 100px;
        }

    </style>
    <form role="form" action="/admin/importgoods/add" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-3">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm kho nhập
                    </header>
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>
                    <div class="panel-body">

                        <div class="position-center">


                            <div class="form-group">
                                <label>Người nhập</label>
                                <select name="id_admin">
                                    @foreach ($admins as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kho nhập</label>
                                <select name="id_warehouse">
                                    @foreach ($warehouses as $item)
                                        <option value="{{ $item->id }}">{{ $item->address }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày nhập kho </label>
                                <input type="date" name="date" class="form-control">
                            </div>

                            <button type="submit" name="add" class="btn btn-info">Thêm</button>

                            <br>
                        </div>
                    </div>
                </section>

            </div>
            <div class="col-lg-9">
                <h3>Áp cho sản phẩm </h3>
                <div class="container_search">
                    <input type="text" class="form-control typeahead" id="product">
                    <div class="search_result" id="search_result">
                        <ul id="show_search_result">

                        </ul>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th>Mã sp</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Sku</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="tr_body">
                        <tr>

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous">
    </script>
    <script>
        $('#product').on('input propertychange', function() {
            //  console.log($(this).val());
            $.ajax({
                url: '/admin/importgoods/action',
                type: 'GET',
                data: {
                    value: $(this).val()
                }
            }).done(function(ketqua) {
                $('#show_search_result').html('');
                // console.log(ketqua);
                let val = $.parseJSON(ketqua);

                let display = ``;
                val.forEach(element => {
                    display += `<li onClick="getProduct(${element.id})">
                        <div class="img_search">
                            <img src="/image/${element.image}" alt="">
                        </div>
                        <div class="name_product">
                            <p>${element.name}</p>
                            <p>${element.price}</p>
                        </div>
                    </li>`;
                });
                $('#show_search_result').html(display);
            });
        });

        $(document).click(function(e) {
            // Đối tượng container chứa popup
            var container = $("#scontainer_search");

            // Nếu click bên ngoài đối tượng container thì ẩn nó đi
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                // $('#search_result').removeClass('active');
            }
        });

        function getProduct(product_id) {
            $.ajax({
                url: '/admin/importgoods/product',
                type: 'GET',
                data: {
                    id: product_id
                }
            }).done(function(ketqua) {
                // $('#tr_body').html('');
                // console.log(ketqua);
                let val = $.parseJSON(ketqua);
                console.log(val);
                let display = ``;
                val.forEach(element => {
                    display += `
                        <tr class="product${element.id} product_info">
                        <td><input hidden name="product_id[]" value="${element.id}">${element.id}</td>
                        <td>${element.name}</td>
                        <td>
                            <img src="/image/${element.image}">
                        </td>
                        <td>${element.sku}</td>
                        <td>${element.price}</td>
                        <td><input type="text" name="quantity"></td>
                        <td><input type="text" name="cost_price"></td>
                        <td onClick="removeProduct(${element.id})">
                            <p>X</p>
                        </td>
                        <tr>`;
                });
                $('#tr_body').append(display);
                let searchResultChilds = $('.product_info');

                for (let i = 0; i < searchResultChilds.length; i++) {
                    const element = searchResultChilds[i];
                    for (let j = i + 1; j < searchResultChilds.length; j++) {
                        const element2 = searchResultChilds[j];
                        if ($(element).html() == $(element2).html()) {
                            element2.remove();
                        }
                    }
                }
            });
        }

        function removeProduct(product_id) {
            let product = $(`.product${product_id}`);
            // console.log(product);
            product.remove();
        }
        $('#product').on('focus', function() {
            $('#search_result').addClass('active');

        });
        $(document).on("click", function(event) {
            if ($(event.target).closest(".container_search").length == 0) {
                $('#search_result').removeClass('active');
            }
        });
    </script>
@endsection
