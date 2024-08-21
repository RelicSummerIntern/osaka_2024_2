<?php

namespace App\Http\Controllers;

use App\Models\Comms;
use App\Models\CommChats;
use App\Models\CommEvents;
use App\Models\Comms2Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommunityController extends Controller
/**
 * コミュニティ"詳細"画面のコントローラ
 */
{
    /**
     * Display the specified resource.
     */
    public function show(id $comm_id)
    {
        // 現在ログインしているユーザのIDを取得
        $user_id = Auth::id();

        // コミュニティIDからモデルを取得
        $comm = Comms::find($comm_id); 

        // 名前を取得、存在しない場合は null
        $comm_name = $comm ? $comm->name : null; 

        //チャット履歴を取得
        $commchat = CommChats::find($comm_id); 

        // 他のメンバのID表を取得
        $members = Comms2Users::where('community_id', $comm_id)->get();


        // ビューにデータを渡す（仮）
        return view('community', [
            'comm_name' => $comm_name,
            'members' => $members, //members->id, condition, ...等の使い方を想定
            'user_id' => $user_id,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comms $comms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comms $comms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comms $comms)
    {
        //
    }
}
