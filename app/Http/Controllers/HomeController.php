<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommEvents;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 現在ログインしているユーザーのIDを取得
        $user_id = Auth::id();
        
        // ユーザー情報を取得
        $user = Auth::user();
        
        // // ユーザーが参加しているコミュニティのIDを取得
        // $comm_ids = Comms2Users::where('user_id', $user_id)->pluck('comm_id');
        
        // // そのコミュニティIDに基づいてコミュニティ情報を取得
        // $comms = Comms::whereIn('id', $comm_ids)->get();
        
        // ビューにデータを渡す
        return view('mypage', [
            'user' => $user, //ユーザ情報
            // 'comms' => $comms //所属コミュニティ情報
        ]);
    }
}
