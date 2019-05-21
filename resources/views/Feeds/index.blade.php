@extends('layouts.app') 


@section('content')
        @if(count($Feeds)>0)
        <table class="table text-center table-striped table-bordered">
            <th>Things Loved (L)</th>
            <th>Things Good At (G)</th>
            <th>Things Earn Money (E)</th>
            <th>Things World Needs (W)</th>
            @foreach($Feeds as $Feed)
                @if($Feed->category == "L")
                <tr>
                    <td>{{$Feed->title}}</td>
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
        </table>
        <h3 class="text-center">SIMILAR ELEMENTS</h3>
        @if(count($users)>0)
        <table class="table text-center table-striped table-bordered">
            <th>Title</th>
            <th>Category</th>
           @for($i=0; $i<count($users); $i++)
                @for($j=$i+1; $j<count($users); $j++)
                    @if($users[$i]["title"]== $users[$j]["title"])
                        <tr>
                            <td>{{$users[$i]["title"]}}</td>
                        <td>{{$users[$i]["category"]}} | {{$users[$j]["category"]}}</td>
                        </tr>
                    @endif
                @endfor
           @endfor
        @else
            <h3>No data found!</h3>
        @endif
        </table>

        
@endsection