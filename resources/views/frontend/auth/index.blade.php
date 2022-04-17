@extends('master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        
                <div class="form-group">
                    <label>Thông tin khách hàng  </label>
                </div>
                
                   
                    
                        @foreach ($data as $item)
                       
                            <p>Mã:{{$item->id}}</p>
                           
                                <p>Tên:{{$item->name}}</p>
                                <p>Email:{{$item->email}}</p>
                                <p>SDT:{{$item->phone}}</p>
                                <p>Đ/c:{{$item->address}}</p>
                                <p>
                                    <img src="../avatar/{{$item->avatar}}" alt="" style="max-width:100px; max-height:100px">
                                </p>

                        <a href="/user/Info/edit/{{$item->id}}">edit</a>
                            
                            
                       
                        @endforeach
                    
                
            </div>
            
        </section>

    </div>
</div>

@endsection
