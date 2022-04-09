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
                    
                    <button type="submit" onclick="sweetalert2()" name="add_colors" class="btn btn-info">Thêm </button>
                    </form>
                    <br>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label>Danh sách màu  </label>
                </div>
                <table class="table table-hover" id="student_tbl">
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.css">
    <script>
        $(document).ready( function () {
        $('#student_tbl').DataTable();
    } );
        </script>
        <script>
            function sweetalert2(){
                Swal({
                    title: 'Success',
                    text: 'Do you want to continue',
                    type: 'success',
                    confirmButtonText: 'Cool'
                })
            }
        </script>
        
@endsection
