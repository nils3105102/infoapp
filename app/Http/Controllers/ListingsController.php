<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        $listings = Listing::orderBy('created_at', 'desc')->get();
        return view('listings')->with('listings', $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createlisting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'website' => 'required',
            'bio' => 'required'

]);
        $listing = new Listing;
        $listing->name= $request->input('name');
        $listing->email= $request->input('email');
        $listing->phone= $request->input('phone');
        $listing->address= $request->input('address');
        $listing->bio= $request->input('bio');
        $listing->website= $request->input('website');
        $listing->user_id = auth()->user()->id;
        $listing->save();
        return redirect('/dashboard')->with('success', 'Listing added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('showlisting')->with('listing', $listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('editlisting')->with('listing', $listing);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'website' => 'required',
            'bio' => 'required'

]);
        $listing = Listing::find($id);
        $listing->name= $request->input('name');
        $listing->email= $request->input('email');
        $listing->phone= $request->input('phone');
        $listing->address= $request->input('address');
        $listing->bio= $request->input('bio');
        $listing->website= $request->input('website');
        $listing->user_id = auth()->user()->id;
        $listing->save();
        return redirect('/dashboard')->with('success', 'Listing updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect('/dashboard')->with('success', 'Listing deleted');
    }
}
