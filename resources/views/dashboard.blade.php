@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">
                        <a href="/feeds/create" class="btn btn-primary">Create Feed</a>
                        <h3> Your Blog Feeds</h3>
                        @if(count($Feeds)>0)
                        <table class="table table-striped">
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        
                        @foreach ($Feeds as $Feed)
                            <tr>
                                <td>{{$Feed->title}}</td>
                                <td><a href="/feeds/{{$Feed->id}}/edit" class="btn btn-primary">Edit</td>
                                <td>{!!Form::open(['action' => ['FeedController@destroy', $Feed->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>    
                        @endforeach
                        @else
                            <p>No Feeds made</p> 
                        @endif
                    </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
