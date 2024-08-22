<?php

namespace App\Http\Controllers;

use App\Models\CommEvents;
use App\Models\OuterEvents;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user_id = Auth::id(); // 現在ログインしているユーザのIDを取得

        $events = CommEvents::all();

        // ビューにデータを渡す
        return view('event.show',[
            'events' => $events //所属コミュニティ情報
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $events =CommEvents::findOrFail($commEvents);
        $comm_events = CommEvents::all();
        $outer_events = OuterEvents::all();
        return view('event.show',[
            'comm_events' => $comm_events // 所属コミュニティのイベント
            
            // "outer_events" => $outer_events 
        ]);    

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
