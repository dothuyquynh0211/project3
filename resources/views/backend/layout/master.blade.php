@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <script src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>

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
@stop
