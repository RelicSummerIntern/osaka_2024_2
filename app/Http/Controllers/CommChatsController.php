<?php

namespace App\Http\Controllers;

use App\Models\CommChats;
use Illuminate\Support\Facades\Auth; // Authクラスをインポート
use Illuminate\Http\Request;

class CommChatsController extends Controller
{
    public function store(Request $request)
    {
        $chat = new CommChats();
        $chat->comm_id = $request->input('comm_id'); // コミュニティIDを入力
        $chat->user_id = Auth::id(); // 現在のユーザーIDを取得
        $chat->text = $request->input('text');
        $chat->save();

        return redirect()->back()->with('chat_success', 'メッセージが送信されました');
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
     * Display the specified resource.
     */
    public function show(CommChats $commChats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommChats $commChats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommChats $commChats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommChats $commChats)
    {
        //
    }
}
