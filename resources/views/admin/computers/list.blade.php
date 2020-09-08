@extends('admin.layouts.app')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible " role="alert">
            {{  Session::get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class=""><a href="{{url("computer")}}">Computer</a></li>
        </ol>
    </nav>
        <a class="btn btn-success pull-right" href="{{'computer/create'}}">Create</a>
        <a class="btn btn-primary pull-right" href="{{'computers/sync'}}">Sync Db</a>
@include( 'admin.computers.table',$computers)
    @endsection
