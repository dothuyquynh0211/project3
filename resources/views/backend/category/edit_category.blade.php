@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa danh mục sản phẩm 
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
                    <form role="form" action="/admin/category/update" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$info->id}}" />                       
                        <div class="form-group">
                            <label>Tên danh mục </label>
                            <input type="text" name="name_category" class="form-control" value="{{$info->name}}">
                        </div>

                        <button type="submit" name="add_category" class="btn btn-info">Cập nhật  </button>
                    </form>
                    <br>
                </div>
            </div>

        </section>

    </div>
</div>
@endsection