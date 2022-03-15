@extends('backend.layout.master')
@section('title','thêm  size')
@section('content')
<h1 class="text-center display-4">Thêm Size</h1>
<form class="text-center" style="width:60%;margin:auto;" method="POST" enctype="multipart/form-data" action="{{url('/create')}}" >
@csrf
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Size</span>
  <input name="name" type="text" class="form-control" placeholder="Size"  aria-describedby="basic-addon1">
</div>


<button class="btn btn-primary">Thêm</button>
</div>
</form>
@endsection