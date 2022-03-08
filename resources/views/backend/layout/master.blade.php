@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
@if(Auth::guard('admin')->user() !=null)
    <span>{{Auth::guard('admin')->user()->name}}</span>
    
    @endif
    @if(Auth::guard('admin')->user() ==null)
                                        <a href="{{route('admin.login')}}" class="nav-link active">
                                             <i class="fas fa-sign-in-alt nav-icon"></i><p>Đăng nhập</p></a>

                                            
                                        @else
                                             <a href="{{route('admin.logout')}}"  class="nav-link active"><i class="fas fa-sign-in-alt nav-icon"></i><p>Đăng xuất</p></a>
                                        @endif

    <p>Welcome to chanel bag.</p>
@stop
