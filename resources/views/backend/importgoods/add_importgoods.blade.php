@extends('backend.layout.master')
@section('title','Trang chủ Admin')
@section('style')

@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Nhập kho 
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
                    <form role="form" action="/admin/importgoods/create" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Date  </label>
                        <input type="date" name="date" class="form-control"  placeholder="Tên sản phẩm   ">
                    </div>                                     
                   
                    <div class="form-group">
                        <label> Kho hàng </label>
                        <select name="warehouse" id="warehouse">
                            @foreach ($warehouses as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Người duyệt</label>
                        <select name="admin" id="admin">
                            @foreach ($admins as $admin)
                                <option value="{{$admin->id}}">{{$admin->name}}</option>
                            @endforeach
                        </select>
                    </div>
                   
                    
                    <button type="submit" name="add_importgoods" class="btn btn-info">Thêm sản phẩm </button>
                    </form>
                    <br>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
