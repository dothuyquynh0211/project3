@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm quyền 
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
                    <form role="form" action="/admin/account/roles" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên quyền </label>
                        <input type="text" name="name_roles" class="form-control"  placeholder="Tên quyền ">
                    </div>
                    
                    <button type="submit" name="add_roles" class="btn btn-info">Thêm quyền </button>
                    </form>
                    <br>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label>Danh sách quyền  </label>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th>Mã</th>
                        <th>Tên quyền </th>
                        <th >Ation </th>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/admin/account/roles/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/admin/account/roles/edit/{{$item->id}}" class="btn btn-primary btn-xs ">Edit</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </section>

    </div>
</div>
@endsection
