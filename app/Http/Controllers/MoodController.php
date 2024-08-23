<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MoodController extends Controller
{ public function updateMood(Request $request)
    
    {
    dd($request->all());
    // 認証されたユーザーを取得

    $user = Auth::user();

    // 入力された体調を保存
    $user->mood = $request->input('mood');
    $user->save();

    // 更新された体調をJSONで返す
    return response()->json(['mood' => $user->mood]);
    }
}

