@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa kho hàng 
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
                    <form role="form" action="/admin/warehouse/update" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$info->id}}" />                       
                        <div class="form-group">
                            <label>Địa chỉ kho hàng  </label>
                            <input type="text" name="address" class="form-control" value="{{$info->address}}">
                        </div>

                        <button type="submit" name="add" class="btn btn-info">Cập nhật  </button>
                    </form>
                    <br>
                </div>
            </div>

        </section>

    </div>
</div>
@endsection