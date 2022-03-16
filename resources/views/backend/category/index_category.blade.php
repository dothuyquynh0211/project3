@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm 
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
                    <form role="form" action="/admin/category" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên danh mục </label>
                            <input type="text" name="name_category" class="form-control">
                        </div>

                        <button type="submit" name="add_category" class="btn btn-info">Thêm </button>
                    </form>
                    <br>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label>Danh sách danh mục sản phẩm  </label>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th>Mã</th>
                        <th>Tên danh mục  </th>
                        <th>Ation </th>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/admin/category/delete/{{$item->id}}"
                                        class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/admin/category/edit/{{$item->id}}"
                                        class="btn btn-primary btn-xs ">Edit</a>
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