@extends('master')



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
                    <form role="form" action="/info" method="post">
                        {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$info->id}}" />
                    <div class="form-group">
                        
                        <input type="text" name="name" class="form-control"   value="{{ $info->name}}">
                    </div>
                    <div class="form-group">
                        
                        <input type="email" name="email" class="form-control"   value="{{ $info->email}}">
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="phone" class="form-control"   value="{{ $info->phone}}">
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="address" class="form-control"   value="{{ $info->address}}">
                    </div>
                    <div class="form-group">
                        
                        <input type="file" name="avatar" class="form-control"   value="{{ $info->avatar}}">
                    </div>
                    
                   
                    <button type="submit" name="add_colors" class="btn btn-info">Cập nhật  </button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection