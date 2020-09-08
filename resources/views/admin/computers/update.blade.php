@extends('admin.layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class=""><a href="{{url("computer")}}">Computer</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@if($errors->any())
<div class="alert alert-danger" role="alert">

    {!!  implode('', $errors->all('<div>:message</div>'))  !!}
</div>
@endif
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible " role="alert">
    {{  Session::get('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form action="{{url('computer')}}/{{$computer->id}}"  method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="provider">provider</label>
        <input type="text" class="form-control"  name="provider" id="provider"  value="{{$computer->provider}}" placeholder="Enter provider">
    </div>
    <div class="form-group">
        <label for="Brand">Brand</label>
        <input type="text" class="form-control"  name="brand_label" id="Brand"  value="{{$computer->brand_label}}"   placeholder="Enter Brand">
    </div>
    <div class="form-group">
        <label for="location">location</label>
        <input type="text" class="form-control" name="location" id="location"   value="{{$computer->location}}"  placeholder="Enter location">
    </div>
    <div class="form-group">
        <label for="CPU">CPU</label>
        <input type="text" class="form-control" name="cpu" id="CPU"   value="{{$computer->cpu}}"  placeholder="Enter CPU">
    </div>
    <div class="form-group">
        <label for="Drive">Drive</label>
        <input type="text" class="form-control" name="drive_label" id="Drive"  value="{{$computer->drive_label}}"   placeholder="Enter Drive">
    </div>
    <div class="form-group">
        <label for="Price">   Price</label>
        <input type="text" class="form-control"  name="price" id="Price"  value="{{$computer->price}}" placeholder="Enter Price">
    </div>



    <button type="submit" class="btn btn-primary right">Submit</button>
</form>

@endsection
