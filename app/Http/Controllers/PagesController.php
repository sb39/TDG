<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
    public function index(){
        $title = 'IKIGAI APP';
        if (Auth::check()){
            $user_name = auth()->user()->name;
            return view('pages.index')->with(array('title' => $title,'user_name' => $user_name));
        }
        else{
            return view('pages.index')->with(array('title' => $title,'user_name' => "NOT_LOGGED_IN"));

        }
    }
}
