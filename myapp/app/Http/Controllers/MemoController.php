<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMemo;
use App\Memo;
use App\User;
use Illuminate\Support\Facades\DB;

class MemoController extends Controller
{
    //一覧表示
    public function index() {
        // メモデータを最終更新日時が新しい順に取得
        $memos = DB::table('memos')->orderBy('updated_at', 'desc')->get();

        
        return view('memos/index', [
            'memos' => $memos,
        ]);
    }

    // 投稿画面表示
    public function showCreateForm() {
        // return view('memos/create', [
        //     'user_id' => $user->id,
        // ]);
        $memo = new Memo();
        return view('memos/create', [
            'memo' => $memo,
        ]);
    }

    // 投稿処理
    public function create(CreateMemo $request) {
        // 現在のユーザーを取得
        $memo = new Memo();

        // 入力値を代入
        $memo->book = $request->book;
        $memo->author = $request->author;
        $memo->title = $request->title;
        $memo->content = $request->content;

        $memo->user_id = 1;
        // インスタンスに代入した値をDBに書き込む
        $memo->save();

        return redirect()->route('memos.index', [
            'id' => $memo->id,
        ]);
    }

    public function edit($id)
    {
        // idに該当するメモデータを取得
        $memo = Memo::find($id);

        return view('memos/edit', [
            'memo' => $memo,
        ]);
    }
}
