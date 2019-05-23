<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
    public function index(){
        header( "refresh:4;url=/dashboard" );
        $title = 'IKIGAI APP';
        // $maxTime = 5;
        if (Auth::check()){
            $user_name = auth()->user()->name;
            return view('pages.index')->with(array('title' => $title, 'user_name' => $user_name));
        }
        else{
            return view('pages.index')->with(array('title' => $title, 'user_name' => "NOT_LOGGED_IN"));

        }
        
        // echo'<script type="text/javascript">
        // function countdown() {
        //     var i = $maxTime;
        //     i.innerHTML = parseInt(i.innerHTML)-1;
        // }
        // setInterval(function(){ countdown(); },1000);
        // </script>';
    }
}

?>
