<?php

namespace App\Http\Controllers;

use App\Models\Comms;
use App\Models\Comms2Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommunityController extends Controller
/**
 * コミュニティ詳細画面のコントローラ
 */
{
    /**
     * Display the specified resource.
     */
    public function show(id $comm_id)
    {
        // 現在ログインしているユーザのIDを取得
        $user_id = Auth::id();

        $comm = Comms::find($comm_id); // コミュニティIDからモデルを取得
        $comm_name = $comm ? $comm->name : null; // 名前を取得、存在しない場合は null

        // 他のメンバのID表を取得
        $members = Comms2Users::where('community_id', $comm_id)->get();

        // ビューにデータを渡す（仮）
        //TODO
        return view('community.show', [
            'community' => $community,
            'members' => $members,
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
