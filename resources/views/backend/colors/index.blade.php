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
            <div class="panel-body col-lg-4">

                <div class="position-center">
                    <form role="form" action="/admin/color" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Chọn màu</label>
                        <input type="color" value="#e66465" name="name_colors" class="form-control"  placeholder="Tên màu ">
                    </div>
                    
                    <button type="submit" name="add_colors" class="btn btn-info">Thêm </button>
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
                        <th>Màu</th>
                        <th >Action </th>
                    </thead>
                    <tbody>
                        @foreach ($colors as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                <div style="background:{{$item->name}};width: 30px;height: 30px;" >
                                </div>
                            </td>
                            <td>
                                <div class='btn-group'>
                                    <a href="/admin/color/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/admin/color/edit/{{$item->id}}" class="btn btn-primary btn-xs ">Edit</a>
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
