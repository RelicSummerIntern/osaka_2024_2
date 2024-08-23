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
    public function index($comm_id, Request $request)
    {

        // 現在ログインしているユーザのIDを取得
        $user_id = $request->query('user_id', Auth::id()); // クエリパラメータがない場合はログインユーザーのIDを使用
    
        // コミュニティIDからコミュニティモデルを取得
        $comm = Comms::find($comm_id);
    
        // コミュニティ名を取得、存在しない場合はnull
        $comm_name = $comm ? $comm->name : null;
    
        // チャット履歴を取得し、ユーザー情報もロード
        $commchat = CommChats::where('comm_id', $comm_id)
        ->with('user') // ユーザー情報を一緒に取得
        ->orderBy('created_at', 'desc') // 最新のメッセージが上に来るように
        ->get();
    
        // 他のメンバの情報を取得
        $members = Comms2Users::where('comm_id', $comm_id)
        ->with('user') // ユーザー情報を一緒に取得
        ->get()
        ->pluck('user'); // 'user'リレーションでUserモデルを取得
    
        // ビューにデータを渡す
        return view('community', [
            'comm_id' => $comm_id,  // コミュニティIDを追加
            'comm_name' => $comm_name,
            'members' => $members,
            'commchat' => $commchat,
            'user_id' => $user_id,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function show()
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
