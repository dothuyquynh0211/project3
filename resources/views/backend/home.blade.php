@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')

@section('content')
    <div class="panel-body">
        @if (Auth::guard('admins')->user() != null)
            <span>{{ Auth::guard('admins')->user()->name }}</span>
        @endif
        @if (Auth::guard('admins')->user() == null)
            <a href="{{ route('admin.login') }}" class="nav-link active">
                <i class="fas fa-sign-in-alt nav-icon"></i>
                <p>Đăng nhập</p>
            </a>
        @else
            <a href="{{ route('admin.logout') }}" class="nav-link active"><i class="fas fa-sign-in-alt nav-icon"></i>
                <p>Đăng xuất</p>
            </a>
        @endif

        <p>Welcome to chanel bag.</p>

        {{-- <div class="position-center">
        <form role="form" action="/admin/warehouse/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$info->id}}" />                       
            <div class="form-group">
                <label>Màu  </label>
                <input type="color" name="address" class="form-control">
            </div>

            <button type="submit" name="add" class="btn btn-info">Thêm   </button>
        </form>
        <br>
    </div> --}}
    </div>
@endsection
