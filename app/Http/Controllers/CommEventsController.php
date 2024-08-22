<?php

namespace App\Http\Controllers;

use App\Models\CommEvents;
use Illuminate\Http\Request;

class CommEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = CommEvents::all();
        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $event =new CommEventS();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->location = $request->input('location');
        $event->save();

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CommEvents $commEvents)
    {
        $event =CommEvents::findOrFail($commEvents);
        return view('event.show', compact('event'));
    }

    
    //  * Show the form for editing the specified resource.
    //  *
    public function edit(CommEvents $commEvents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommEvents $commEvents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommEvents $commEvents)
    {
        //
    }
}
