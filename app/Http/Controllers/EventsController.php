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

    public function show(Request $request, $datetime) //2024-08-23など
    {   
        // datetimeパラメータを日付として変換
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $datetime);
        // 該当日のコミュニティイベントを取得
        $comm_events = CommEvents::with('comms')->whereDate('held_datetime', $date)->get();
        // 該当日の外部イベントを取得
        $outer_events = OuterEvents::whereDate('held_datetime', $date)->get();
        // ビューにデータを渡す
        return view('event.show', [
            'comm_events' => $comm_events, // 所属コミュニティのイベント
            'outer_events' => $outer_events, // 外部イベント
            "date" => $date
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
