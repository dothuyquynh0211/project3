@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm màu
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
                    <form role="form" action="/backend/colors/index" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên màu</label>
                        <input type="color" value="#e66465" name="name_colors" class="form-control"  placeholder="Tên màu ">
                    </div>
                    
                    <button type="submit" name="add_colors" class="btn btn-info">Thêm màu </button>
                    </form>
                    <br>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label>Danh sách màu  </label>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th>Mã</th>
                        <th>Tên màu</th>
                        <th >Action </th>
                    </thead>
                    <tbody>
                        @foreach ($colors as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/backend/colors/index/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/backend/colors/edit/{{$item->id}}" class="btn btn-primary btn-xs ">Edit</a>
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
