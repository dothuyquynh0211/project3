@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<style>
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
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa mã khuyến mại
            </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
            <div class="panel-body">

                <div class="position-center">
                    <form role="form" action="/admin/coupons/update" method="post">
                        {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$info->id}}">
                    <div class="form-group">
                        <label>Tên mã  </label>
                        <input type="text" name="name" class="form-control" value="{{$info->name}}" placeholder="Tên mã ">
                    </div>
                    <div class="form-group">
                        <label>Điều kiện</label>
                        <select name="coupons_condition">
                            <option value="1">Giảm theo %</option>
                            <option value="2">Giảm cố định </option>
                        </select>
                    </div>                                  
                    <div class="form-group">
                        <label>Giá trị </label>
                        <input type="text" name="value" class="form-control"  value="{{$info->value}} "placeholder="30">
                    </div>                              
                    <div class="form-group">
                        <label>Mã code </label>
                        <input type="text" name="coupons_code" class="form-control" value="{{$info->coupons_code}} " placeholder="FREE">
                    </div>
                    <div class="form-group">
                        <label>Số lần sử dụng  </label>
                        <input type="text" name="coupons_number" class="form-control" value="{{$info->coupons_number}}" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label class="switch">
                            <input type="checkbox" name="status">
                            <span class="slider round"></span>
                          </label>
                    </div>
                    <div class="form-group">
                        <label>Ngày áp dụng </label>
                        <input type="date" name="start_date" class="form-control" value="{{$info->start_date}}">
                    </div> 
                    <div class="form-group">
                        <label>Ngày kết thúc </label>
                        <input type="date" name="end_date" class="form-control"   value="{{$info->end_date}}">
                    </div>               
                    <button type="submit" name="add" class="btn btn-info">Cập nhật </button>
                    </form>
                    <br>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
