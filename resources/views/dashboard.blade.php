@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
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
                        <h3 class="text-center"> My  Feeds</h3>
                        @if(count($Feeds)>0)
                        <table class="table table-striped">
                            <th>Title</th>
                            <th>Category</th>
                            <th></th>
                            <th></th>
                        
                        @foreach ($Feeds as $Feed)
                            <tr>
                                <td>{{$Feed->title}}</td>
                                <td>{{$Feed->category}}</td>
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
        @php
        $show = 0;
        $l_counter=0;
        $g_counter=0;
        $e_counter=0;
        $w_counter=0;
                
        foreach($Feeds as $feed)
           {
                if($feed->category=="L"){$l_counter++;}
                if($feed->category=="G"){$g_counter++;}
                if($feed->category=="E"){$e_counter++;}
                if($feed->category=="W"){$w_counter++;}
            }
        if(($l_counter && $g_counter && $e_counter && $w_counter)>=1)
        {
            $show = 1;
        }
        @endphp
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">My PURPOSE Formation Categories</div>
                <div class="card-body">
                        @if(count($users)>0 && $show == 1)
                        <table class="table text-center table-striped table-bordered">
                            <th>Passion</th>
                            <th>Profession</th>
                            <th>Mission</th>
                            <th>Vocation</th>
                           @for($i=0; $i<count($users); $i++)
                                @for($j=$i+1; $j<count($users); $j++)
                                    @if($users[$i]["title"]== $users[$j]["title"] && auth()->user()->id == $users[$i]["user_id"])
                                        @if(($users[$i]["category"] =="L" &&  $users[$j]["category"] =="G") || ($users[$i]["category"] =="G" && $users[$j]["category"]== "L"))
                                        
                                        <tr>
                                            <td>{{$users[$i]["title"]}} <small>(By: {{$users[$i]["user_name"]}})
                                        </td>
                                            <td>{{""}}</td>
                                            <td>{{""}}</td>
                                            <td>{{""}}</td>
                                        </tr>
                                        @endif
                                        @if(($users[$i]["category"] == "G" && $users[$j]["category"] == "E") || ($users[$i]["category"] == "E" && $users[$j]["category"] == "G"))
                                        
                                        <tr>
                                            <td>{{""}}</td>
                                            <td>{{$users[$i]["title"]}} <small>(By: {{$users[$i]["user_name"]}})
                                            </td>
                                            <td>{{""}}</td>
                                            <td>{{""}}</td>
                                        </tr>
                                        @endif
                                        @if(($users[$i]["category"] == "E" && $users[$j]["category"] == "W") || ($users[$i]["category"] == "W" && $users[$j]["category"] == "E"))
                                        
                                        <tr>
                                            <td>{{""}}</td>
                                            <td>{{""}}</td>
                                            <td>{{""}}</td>    
                                            <td>{{$users[$i]["title"]}} <small>(By: {{$users[$i]["user_name"]}})
                                            </td>
                                        </tr>
                                        @endif
                                        @if(($users[$i]["category"] == "L" && $users[$j]["category"] == "W") || ($users[$i]["category"] == "W" && $users[$j]["category"] == "L"))
                                        
                                        <tr>
                                            <td>{{""}}</td>
                                            <td>{{""}}</td>
                                            <td>{{$users[$i]["title"]}} <small>(By: {{$users[$i]["user_name"]}})
                                            </td>
                                            <td>{{""}}</td>
                                        </tr>
                                        @endif
                                    @endif
                                @endfor
                           @endfor
                        @else
                            <h5 class="text-center text-danger font-weight-bold">Insufficient Data</h5>
                            Hint: <small>you must have four different data in four different categories</small>
                        @endif
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
