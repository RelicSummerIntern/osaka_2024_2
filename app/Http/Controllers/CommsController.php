<?php

namespace App\Http\Controllers;

use App\Models\Comms;
use App\Models\Comms2Users;
use Illuminate\Http\Request;

class CommsController extends Controller
{
    //コミュニティに入るときの動作
    public function visit()
    {
        // 自分がコミュニティに属しているかを確認
        $user_id = auth()->id(); // 現在ログインしているユーザのIDを取得
        $comm_id = request()->route('comm_id'); // ルートパラメータからコミュニティIDを取得
        $this->_checkin($user_id, $comm_id);
        
        // OKなら、コミュニティページにリダイレクト
        return redirect()->route('community.show', ['id' => $comm_id]);
    }
    
    // コミュニティに属しているかを確認する
    private function _checkin(int $user_id, int $comm_id)
    {
        // 中間テーブルを参照し、渡されたユーザIDとコミュニティIDの組合せがあるか確認
        $exists = Comms2Users::('community_user')
                    ->where('user_id', $user_id)
                    ->where('community_id', $comm_id)
                    ->exists();
    
        // 組合せがない場合は、例外を投げる
        if (!$exists) {
            throw new \Exception('このコミュニティに属していません。');
        }
    
        // 組合せがある場合は何もしない（OK）
    }

    /**
     * Display the specified resource.
     */
    public function show(Comms $comms)
    {
        //
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
