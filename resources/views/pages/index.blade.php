@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h2>Welcome to the {{$title}}</h2>
        {{-- <h1> this is the INDEX page</h1> --}}
        <br>
        <div class="col-md-12 justify-content-center form-inline">
               You are logged in as <input class="form-control" type="text" placeholder={{$user_name}} readonly>
               
        </div>
        <br>
        <div class="col-md-12 justify-column-center">
            <h5 class="text-danger font-weight-bold">Redirecting To Your Personal Dashboard in <span id="c">5</span></h5>
        </div>
        @php
        echo'<script type="text/javascript">
        function countdown() {
            var i = document.getElementById("c");
            i.innerHTML = parseInt(i.innerHTML)-1;
        }
        setInterval(function(){ countdown(); },1000);
        </script>
        ';
        @endphp
    </div>
@endsection