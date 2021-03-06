<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemoRequest;
use App\Memo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemoController extends Controller
{
    //一覧表示
    public function index() {
        // メモデータを最終更新日時が新しい順に取得
        $memos = Memo::orderBy('updated_at', 'desc')->paginate(10);

        return view('memos/index', [
            'memos' => $memos,
            // 'names' => $names,
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
    public function create(MemoRequest $request) {
        // 現在のユーザーを取得
        $memo = new Memo();

        // 入力値を代入
        $memo->book = $request->book;
        $memo->author = $request->author;
        $memo->title = $request->title;
        $memo->content = $request->content;

        // インスタンスに代入した値を、ユーザーに紐付けてDBに書き込む
        Auth::user()->memos()->save($memo);

        return redirect()->route('memos.index');
    }

    // 編集画面表示
    public function showEditForm(Memo $memo)
    {
        return view('memos/edit', [
            'memo' => $memo,
        ]);
    }

    // 編集処理
    public function edit(Memo $memo, MemoRequest $request) {

        // 入力値を代入
        $memo->book = $request->book;
        $memo->author = $request->author;
        $memo->title = $request->title;
        $memo->content = $request->content;

        // インスタンスに代入した値を、ユーザーに紐付けてDBに書き込む
        Auth::user()->memos()->save($memo);

        return redirect()->route('memos.index');
    }

    // 削除処理(物理削除)
    public function destroy(Memo $memo) {
        Memo::destroy($memo->id);
        
        return redirect()->route('memos.index');
    }

    // メモ詳細画面表示
    public function showDetail(Memo $memo) {
        $user = User::find($memo->user_id);

        return view('memos/detail', [
            'memo' => $memo,
            'user' => $user,
        ]);
    }

    // ログインユーザーのメモ一覧・ユーザー情報
    public function showMyPage() {

        // ログインユーザー取得
        $user = Auth::user();

        // メモのレコードがなければメモを渡さない
        $isExists = Memo::where('user_id', $user->id)->exists();
        if ($isExists === false){
            return view('user/mypage', [
                'user_name' => $user->name,
                'user_email' => $user->email,
                'memos' => null,
            ]); 
        }

        // userのidとmemoのuser_idが一致するレコードを取得
        $memos = Memo::where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(10);

        // viewにユーザーとメモを渡す
        return view('user/mypage', [
            'user_name' => $user->name,
            'user_email' => $user->email,
            'memos' => $memos,
        ]);
    }

    // 検索画面表示
    public function showSearchForm() {
        return view('memos/search');
    }

    // 検索処理
    public function search(Memo $memo, Request $request) {

        // 値をセット
        if (strlen($request->book) !== 0) {
            $book = $request->book;
        }
        if (strlen($request->author) !== 0) {
            $author = $request->author;
        }

        // どちらも入力されていなければエラーを返す
        if (empty($book) && empty($author)) {
            $message = '検索内容を入力してください';
            return view('memos/search', [
                'message' => $message,
            ]);
        }

        // 検索
        // 著書名だけ入力された場合
        if (!empty($book) && empty($author)) {
            $memos = $memo->where('book','like', '%'.$book.'%')->orderBy('updated_at', 'desc')->paginate(10);
            $count = $memos->count();
        }
        // 著者だけ入力された場合
        if (empty($book) && !empty($author)) {
            $memos = $memo->where('author','like', '%'.$author.'%')->orderBy('updated_at', 'desc')->paginate(10);
            $count = $memos->count();
        }
        // 両方入力された場合
        if (!empty($book) && !empty($author)) {
            $memos = $memo->where('book','like', '%'.$book.'%', 'AND', 'author','like', '%'.$author.'%')->orderBy('updated_at', 'desc')->paginate(10);
            $count = $memos->count();
        }

        return view('memos/search', [
            'memos' => $memos,
            'count' => $count,
            ]);
    }
}
