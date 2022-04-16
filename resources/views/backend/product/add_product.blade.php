@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')
@section('style')

@endsection
@section('content')
<script type="text/javascript" src="{{ asset('/backend/ckeditor/ckeditor.js') }}"></script>

    <style>
        .color-choise-group {
            display: flex;
            margin-left: 30px;
        }

        .color-choise {
            position: relative;
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        .color-choise:last-child {
            margin-right: 0;
        }

        .color-choise .radio {
            opacity: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border: 0;
            margin: 0;
            cursor: pointer;
            z-index: 999;
        }

        .color-choise .radio:checked~.radio-span::after {
            background-image: url('/backend/images/check.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-size: 100%;
            position: absolute;
            top: -10px;
            right: -10px;
            content: "";
            z-index: 1;
            width: 100%;
            height: 100%;
        }

        .color-choise .radio-span {
            width: 100%;
            height: 100%;
            background-color: blue;
            display: block;
            position: relative;
        }
        .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
    </style>


    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
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
                        <form role="form" action="/admin/product/create" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên sản phẩm </label>
                                <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm   ">
                            </div>
                            <div class="form-group">
                                <label> SKU</label>
                                <input type="text" name="sku" class="form-control" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label>Giá </label>
                                <input type="text" name="price" class="form-control" placeholder=" 300000 ">
                            </div>
                            <div class="form-group">
                                <label>Giá trước khi giảm</label>
                                <input type="text" name="sale_price" class="form-control" placeholder=" 350000 ">
                            </div>
                            
                            <div class="form-group">
                                <label> Ảnh</label>
                                <input type="file" name="image" id="url_img" class="form-control"
                                    onchange="changePhoto()">
                            </div>
                            <div class="form-group">
                                <label>Nhiều ảnh</label>
                                <input type="file" name="images[]" id="multi_input" class="form-control" multiple>
                            </div>
                            <div class="form-group">
                                {{-- <label>Trạng thái</label>
                                <input type="radio" name="status"> --}}
                                <label class="switch">
                                    <input type="checkbox" name="status">
                                    <span class="slider round"></span>
                                  </label>
                            </div>
                            <div class="form-group">
                                <label>Brand </label>
                                <select name="brand" id="brand">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="category" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <select name="size" id="size">
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="display: flex">
                                <label>Color</label>
                                <div class="color-choise-group">
                                    @foreach ($colors as $color)
                                        <div class="color-choise">
                                            <input type="radio" class="radio" name="color"
                                                value="{{ $color->id }}">
                                            <span class="radio-span"
                                                style="background-color:{{ $color->name }} "></span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mô tả </label>
                                <textarea name="description" class="form-control" placeholder=" 300000 " id='ckeditor1'></textarea>
                            </div>
                            <button  type="submit" name="add_account" onclick="sweetalert2()" class="btn btn-info">Thêm sản phẩm </button>
                        </form>
                        <br>
                    </div>
                </div>
            </section>

        </div>
        <div class="col-lg-6">
            <div class="image">
                <label for="">Image</label>
                <img src="/backend/images/images-plus.png" id="img_preview" width="200px" height="200px;">
            </div>
            <div class="gallery">
                <label for="">Gallery</label>
                <div id="multi_images"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.css">
    <script>
        function changePhoto() {
            let vPhoto = document.getElementById('img_preview');
            let vLink = document.getElementById('url_img');
            let vURL = URL.createObjectURL(vLink.files[0]);
            vPhoto.src = vURL;
        }
        const image = document.getElementById("multi_input");
        image.addEventListener("change", (evt) => {
            let imgList = evt.target.files;
            let showImg = document.getElementById("multi_images");
            showImg.innerHTML = '';
            for (const img of imgList) {
                let url = URL.createObjectURL(img);
                showImg.innerHTML = `${showImg.innerHTML} <img src="${url}" alt="" style="width:200px" />`;
            }
        });
    </script>
    <script type="text/javascript">
    CKEDITOR.replace( 'ckeditor1' );
</script>

<script>
    function sweetalert2(){
        Swal({
            title: 'Success',
            text: 'Do you want to continue',
            type: 'success',
            confirmButtonText: 'Cool'
        })
    }
</script>
@endsection
