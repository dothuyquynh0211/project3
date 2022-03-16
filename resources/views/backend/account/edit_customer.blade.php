@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm tài khoản khách hàng 
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
                    <form role="form" action="/admin/account/customer/update" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$info->id}}">
                    <div class="form-group">
                        <label>Tên tài khoản  </label>
                        <input type="text" name="name" class="form-control" value="{{$info->name}}" placeholder="Tên tài khoản  ">
                    </div>                                     
                    <div class="form-group">
                        <label>Email  </label>
                        <input type="email" name="email" class="form-control" value="{{$info->email}}" placeholder="Email ">
                    </div>
                    <div class="form-group">
                        <label>Avt  </label>
                        <input type="file" name="avt" class="form-control"  placeholder="Email ">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại   </label>
                        <input type="text" name="phone" class="form-control" value="{{$info->phone}}" placeholder="Số điện thoại   ">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ  </label>
                        <input type="text" name="address" class="form-control" value="{{$info->address}}" placeholder="Địa chỉ ">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu  </label>
                        <input type="password" name="password" class="form-control"  placeholder="Mật khẩu  ">
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
