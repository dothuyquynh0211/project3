@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.css">


    {{-- @if (Auth::guard('admins')->user() != null)
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

    <p>Welcome to chanel bag.</p> --}}
    
   

@stop
{{-- <script type="text/javascript">
    CKEDITOR.replace('ckeditor1');
</script> --}}



