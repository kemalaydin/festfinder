<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Event;
use App\Model\Organizer;
use App\Model\Place;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $Event = Event::where('slug',$slug)->with('prices','place','organizer','category','subcategory')->first();
        return view('frontend.event.show',compact('Event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function category($slug){
        $Category = Category::where('slug',$slug)->first();
        return view('frontend.event.filter',compact('Category'));
    }

    public function organizer($slug){
        $Organizer = Organizer::where('slug',$slug)->first();
        return view('frontend.event.organizer',compact('Organizer'));
    }

    public function place($slug){
        $Place = Place::where('slug',$slug)->first();
        return view('frontend.event.place',compact('Place'));
    }
}
