@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa 
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
                    <form role="form" action="/admin/account/roles/update" method="post">
                        {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$info->id}}" />
                    <div class="form-group">
                        <label>Tên quyền </label>
                        <input type="text" name="name_roles" class="form-control"  placeholder="Tên quyền " value="{{ $info->name}}">
                    </div>
                    
                    <button type="submit" name="add_roles" class="btn btn-info">Cập nhật  </button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
