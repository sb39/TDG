@extends('layouts.app') 


@section('content')
        <h1>Edit Feeds</h1>
        {!! Form::open(['action' => ['FeedController@update',$Feed->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', $Feed->title ,['class' => 'form-control', 'placeholder' => 'title'])}}
                </div>
                <div class="form-group">
                        {{Form::select('category', array('L' => 'LoveDoing', 'G' => 'GoodAt', 'E' => 'EarnMoney', 'W' => 'WorldNeeds'))}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection