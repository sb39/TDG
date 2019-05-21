@extends('layouts.app') 


@section('content')
        <h1>Create Feeds</h1>
        {!! Form::open(['action' => 'FeedController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'title'])}}
                </div>
                <div class="form-group">
                        {{Form::select('category', array('L' => 'LoveDoing', 'G' => 'GoodAt', 'E' => 'EarnMoney', 'W' => 'WorldNeeds'))}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection
