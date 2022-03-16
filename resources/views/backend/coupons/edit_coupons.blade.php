@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm mã khuyến mại
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
                    <form role="form" action="/admin/account/customer/add" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên mã  </label>
                        <input type="text" name="name" class="form-control"  placeholder="Tên tài khoản  ">
                    </div>                                     
                    <div class="form-group">
                        <label>Giá trị ( đơn vị %) </label>
                        <input type="email" name="text" class="form-control"  placeholder="30">
                    </div>
                    <div class="form-group">
                        <label>Mã code </label>
                        <input type="text" name="avt" class="form-control"  placeholder="FREE">
                    </div>
                    <div class="form-group">
                        <label>Số lần sử dụng  </label>
                        <input type="text" name="phone" class="form-control"  placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Status </label>
                        <input type="radio" name="status">
                    </div>
                    <div class="form-group">
                        <label>Ngày áp dụng </label>
                        <input type="date" name="start_date" class="form-control"  placeholder="Mật khẩu  ">
                    </div> 
                    <div class="form-group">
                        <label>Ngày kết thúc </label>
                        <input type="date" name="end_date" class="form-control"  placeholder="Mật khẩu  ">
                    </div>               
                    <button type="submit" name="add_account" class="btn btn-info">Thêm tài khoản  </button>
                    </form>
                    <br>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
