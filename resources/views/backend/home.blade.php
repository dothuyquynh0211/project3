@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<script src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
<div class="panel-body">

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