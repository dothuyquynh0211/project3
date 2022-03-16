@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm địa chỉ kho hàng  
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
                    <form role="form" action="/admin/warehouse" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Địa chỉ kho hàng </label>
                            <input type="text" name="address" class="form-control">
                        </div>

                        <button type="submit" name="add" class="btn btn-info">Thêm </button>
                    </form>
                    <br>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label>Danh sách kho hàng </label>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th>Mã kho</th>
                        <th>Địa chỉ  </th>
                        <th>Ation </th>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->address}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/admin/warehouse/delete/{{$item->id}}"
                                        class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/admin/warehouse/edit/{{$item->id}}"
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