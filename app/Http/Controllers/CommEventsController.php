<?php

namespace App\Http\Controllers;

use App\Models\CommEvents;
use Illuminate\Support\Facades\Auth; // Authクラスをインポート
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CommEventsController extends Controller
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
        // $events =CommEvents::findOrFail($commEvents);
        $events = CommEvents::all();
        return view('event.show',[
            'events' => $events //所属コミュニティ情報
        ]);    

    }

    // コミュニティイベントを取得し、デバッグ用にイベント内容をログに表示
    public function fetchUserEvents(Request $request)
    {
        $userId = Auth::id(); // 現在のユーザーID
        $comm_ids = DB::table('comms2_users')->where('user_id', $userId)->pluck('comm_id'); // ユーザーが所属しているコミュニティのIDを取得
        
        $events = CommEvents::whereIn('comm_id', $comm_ids)->get(); // 所属コミュニティのイベントを取得
        
        // デバッグ用にイベントの内容をログに表示
        //Log::info('取得したイベント:', ['events' => $events->toArray()]);
        
        return response()->json($events);
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
