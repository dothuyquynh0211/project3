@extends('backend.layout.master')
@section('title','cập nhật size')
@section('content')
<h1 class="text-center display-4">Cập nhật loại sách</h1>
<form class="text-center" style="width:60%;margin:auto;" method="POST" enctype="multipart/form-data">
@csrf
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon0">ID</span>
  <input readonly value="{{$kiemtra->id}}"  type="text" class="form-control" placeholder="Họ và tên"  aria-describedby="basic-addon0">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">SIZE</span>
  <input value="{{$kiemtra->name}}" name="names" type="text" class="form-control" placeholder="Loại sách"  aria-describedby="basic-addon1">
</div>

<button class="btn btn-primary">UPDATE</button>

</form>
@endsection