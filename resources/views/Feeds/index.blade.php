@extends('layouts.app') 


@section('content')
        {{-- @if(count($Feeds)>0)
        <table class="table text-center table-striped table-bordered">
            <th>Things Loved (L)</th>
            <th>Things Good At (G)</th>
            <th>Things Earn Money (E)</th>
            <th>Things World Needs (W)</th>
            @foreach($Feeds as $Feed)
                @if($Feed->category == "L")
                <tr>
                    <td>{{$Feed->title}} {{$Feed->user->name}}</td>
                    <td>{{"-"}}</td>
                    <td>{{"-"}}</td>
                    <td>{{"-"}}</td>
                </tr>
                @endif
                @if($Feed->category == "G")
                <tr>
                    <td>{{"-"}}</td>
                    <td>{{$Feed->title}}</td>
                    <td>{{"-"}}</td>
                    <td>{{"-"}}</td>
                </tr>
                @endif
                @if($Feed->category == "E")
                <tr>
                        <td>{{"-"}}</td>
                        <td>{{"-"}}</td>
                        <td>{{$Feed->title}}</td>
                        <td>{{"-"}}</td>
                </tr>
                @endif
                @if($Feed->category == "W")
                <tr>
                    <td>{{"-"}}</td>
                    <td>{{"-"}}</td>
                    <td>{{"-"}}</td>
                    <td>{{$Feed->title}}</td>
                </tr>
                @endif
            @endforeach
            <div class="col-md-12 row justify-content-center">{{$Feeds->links()}}</div>
        @else
            <h3>No data found!</h3>
        @endif
        </table> --}}
        <h3 class="text-center">Data of all users sorted a/p Categories</h3>
        @if(count($users)>0 )
        <table class="table text-center table-striped table-bordered">
            <th>Passion</th>
            <th>Profession</th>
            <th>Mission</th>
            <th>Vocation</th>
           @for($i=0; $i<count($users); $i++)
                @for($j=$i+1; $j<count($users); $j++)
                    @if($users[$i]["title"]== $users[$j]["title"])
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
            <h3>No data found!</h3>
        @endif
        </table>

       
@endsection