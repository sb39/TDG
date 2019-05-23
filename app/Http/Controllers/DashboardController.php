<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $users = Feed::all('title', 'category', 'user_id', 'user_name');
        // return count($user->feeds);
        return view('dashboard')->with(array('Feeds'=> $user->feeds,'users'=> $users));
    }
}
