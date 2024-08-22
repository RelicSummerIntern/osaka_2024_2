<?php

namespace App\Http\Controllers;

use App\Models\Comms;
use App\Models\Comms2Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommsController extends Controller
/**
 * コミュニティ"一覧"画面のコントローラ
 */
{
    //コミュニティに入るときの動作
    public function enter()
    {
        // 自分がコミュニティに属しているかを確認
        $user_id = Auth::id(); // 現在ログインしているユーザのIDを取得
        
        // リクエストからコミュニティIDを取得し、コミュニティのレコードを取得
        $comm_id = request()->route('comm_id');
        $community = Comms::find($comm_id); // コミュニティのレコードを取得
        
        // コミュニティIDを取得
        if (!$community) {
            abort(404, 'コミュニティが見つかりません。');
        }
        
        // コミュニティIDを基にチェックインを行う
        $this->_checkin($user_id, $comm_id);
        
        // OKなら、コミュニティページに飛ばす
        return redirect()->route('community.index',
            ['user_id' => $user_id, 'comm_id' => $comm_id]);
        
        // OKなら、コミュニティページに飛ばす
        return redirect()->route('community.show', ['id' => $comm_id]);
    }
    
    // コミュニティに属しているかを確認する
    private function _checkin($user_id, $comm_id)
    {
        $exists = Comms2Users::where('user_id', $user_id)
            ->where('comm_id', $comm_id)
            ->exists();
        
        if (!$exists) {
            abort(403, 'このコミュニティに所属していません。');
        }
    }
    
    /**
     * コミュニティ一覧を表示
     */
    public function index()
    {
        // 現在ログインしているユーザーのIDを取得
        $user_id = Auth::id();
        
        // ユーザー情報を取得
        $user = Auth::user();
        
        // ユーザーが参加しているコミュニティのIDを取得
        $comm_ids = Comms2Users::where('user_id', $user_id)->pluck('comm_id');
        
        // そのコミュニティIDに基づいてコミュニティ情報を取得
        $comms = Comms::whereIn('id', $comm_ids)->get();
        
        // ビューにデータを渡す
        return view('comms', [
            'user' => $user, //ユーザ情報
            'comms' => $comms //所属コミュニティ情報
        ]);
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
