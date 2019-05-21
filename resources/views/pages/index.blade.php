@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h2>{{$title}}</h2>
        <h1> this is the INDEX page</h1>
        <br>
        <div class="col-md-12 justify-content-center form-inline">
               You are logged in as <input class="form-control" type="text" placeholder={{$user_name}} readonly>
        </div>
    </div>
@endsection