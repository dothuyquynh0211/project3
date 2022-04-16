@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                {{-- <header class="panel-heading">
                <a href="/admin/product/create">Thêm sản phẩm  </a> 
            </header> --}}
                <div>
                    <div class="form-group">
                        <label>Danh sách hoá đơn </label>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            
                            <th> Tên sản phẩm </th>
                            <th> Ảnh</th>
                            <th> Mã phiếu giảm giá</th>
                            <th> Số lượng</th>
                            <th> Đơn giá</th>
                            <th> Tổng tiền </th>
                        </thead>
                        <tbody id="invoice_table">
                            <?php
                           $total=0;
                            // $total=$price*$quantity;
                            //  print $total;
                             ?> 
                            @foreach ($invoice as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <img src="/image/{{ $item->image }}" alt=""
                                            style="max-height: 80px;max-width:80px">
                                    </td>
                                   
                                    <td>{{ $item->coupons_code }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->price * $item->quantity }}</td>
                                   
                                    <?php
                                    $total +=$item->price * $item->quantity;
                                
                                      ?> 
                                    
                                </tr>
                            @endforeach
                          
                           
                        </tbody>
                    </table>
                    <div class="total-payment">
                        <h3>Thành tiền :  <?php
                           echo $total; 
                        
                              ?> </h3>
                    </div>
                </div>
               
            </section>
            <a target="_blank" href="#">In đơn hàng</a>
        </div>
    </div>

@endsection
