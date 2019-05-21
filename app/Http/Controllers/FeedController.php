<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Feed;

class FeedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Feed = Feed::orderBy('title', 'asc')->get(); 
        $users = Feed::all('title', 'category');
        //paginate
        $Feeds = Feed::orderBy('created_at', 'desc')->paginate(5);
        return view('Feeds.index')->with(array('Feeds' => $Feeds,'users' => $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Feeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
         ]);
        
        // Create Feeds
        $Feed = new Feed;
        $Feed->title = $request->input('title');
        $Feed->category = $request->input('category');
        $Feed->user_id = auth()->user()->id;
        $Feed->save();

        return redirect('/feeds/create')->with('success', 'Feed Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Feed=Feed::find($id);
        return view('Feeds.show')->with('Feed', $Feed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Feed=Feed::find($id);

        if(auth()->user()->id !== $Feed->user_id)
        {
            return redirect('/feeds')->with('error', 'UnAuthorised Access');
        }
        return view('Feeds.edit')->with('Feed', $Feed);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        // Update Feeds
        $Feed = Feed::find($id);
        $Feed->title = $request->input('title');
        $Feed->save();

        return redirect('/feeds')->with('success', 'Feed Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Feed=Feed::find($id);

        if(auth()->user()->id != $Feed->user_id)
        {
            return redirect('/feeds')->with('error', 'UnAuthorised');
        }
        
        $Feed->delete();
        return redirect('/feeds')->with('success', 'Feed Removed!');
    }
}
