<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //ログイン後の画面を返す
    public function index()
    {
        // ログインユーザー取得
        $user = Auth::user();

        // ユーザーのメモを取得
        $memo = $user->memos->first();

        // メモがなければホーム画面へ
        if (is_null($memo)) {
            return view('home');
        }

        // メモがあれば一覧画面へ
        return redirect()->route('memos.index');
    }
}
