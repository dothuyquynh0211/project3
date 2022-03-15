@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm tài khoản  
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
                    <form role="form" action="/admin/account/staff" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên tài khoản  </label>
                        <input type="text" name="name" class="form-control"  placeholder="Tên tài khoản " value="{{$info->name}}">
                    </div>
                    <div class="form-group">
                        <label>Email  </label>
                        <input type="email" name="email" class="form-control"  placeholder="Email " value="{{$info->email}}">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại   </label>
                        <input type="text" name="phone" class="form-control"  placeholder="Số điện thoại" value="{{$info->phone}}">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu  </label>
                        <input type="password" name="password" class="form-control"  placeholder="Mật khẩu ">
                    </div>
                    <div class="form-group">
                        <label>Quyền </label>
                        <select name="id_roles">
                            <option> -- Chọn quyền --</option>
                            @foreach($roles as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                          </select>
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
