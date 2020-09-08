@extends('admin.layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
{{--            <li class="breadcrumb-item"><a href="{{url('computer')}}">Computer</a></li>--}}
            <li class=""><a href="{{url("computer")}}">Computer</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$computer->id}}</li>
        </ol>
    </nav>
    provider : {{$computer->provider}}<br>
    provider_name : {{$computer->provider_name}}<br>
    brand_label : {{$computer->brand_label}}<br>
    location : {{$computer->location}}<br>
    cpu : {{$computer->cpu}}<br>
    drive_label : {{$computer->drive_label}}<br>
    price : {{$computer->price}}<br>

@endsection
