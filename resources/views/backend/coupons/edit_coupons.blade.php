@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
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
                        <label>Giá trị ( đơn vị %) </label>
                        <input type="text" name="value" class="form-control" value="{{$info->value}} " placeholder="30">
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
                        <label>Status </label>
                        <input type="radio" name="status">
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
