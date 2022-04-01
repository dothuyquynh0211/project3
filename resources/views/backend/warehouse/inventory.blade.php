@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <a href="/admin/importgoods/add">Thêm sản phẩm  </a> 
            </header>
            <div>
                <div class="form-group">
                    <label>Danh sách   </label>
                </div>
                <table class="table table-hover" id="student_tbl">
                    <thead>
                        <th> Mã</th>
                        <th> Tên sản phẩm</th>
                        <th> Số lượng</th>
                        <th> Số lượng tồn</th>
                        <th>Số lượng bán</th>
                      
                        <th> Action </th>
                    </thead>
                    <tbody>

                        @foreach ($list1 as $item)
                      <?php 
                      //dd($item);
                      ?>
                        <tr>
                            <td>{{$item->id_product}}</td>
                            <td>{{$item->name_pr}}</td>
                           
                            <td>{{$item->sum_quantity}}</td>
                            
                            
                            {{-- <td>
                                 <div class='btn-group'>
                                    <a href="/admin/detail/{{$item->id}}" class="btn btn-danger btn-xs ">Detail </a>
                                    <a href="/admin/importgoods/delete/{{$item->id}}" class="btn btn-danger btn-xs ">Delete </a>
                                    <a href="/admin/importgoods/detail/{{ $item->id }}"
                                        class="btn btn-primary btn-xs ">detail</a>
                                </div>
                            </td>  --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </section>

    </div>
</div>


@endsection

