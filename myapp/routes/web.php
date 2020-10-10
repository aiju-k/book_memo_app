<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// 認証機能のルーティング
Auth::routes();

//一覧画面 
Route::get('/', 'MemoController@index')->name('memos.index');
//詳細画面 
Route::get('/memos/{memo}/detail', 'MemoController@showDetail')->name('memos.detail');
// 検索画面
Route::get('/memos/search', 'MemoController@showSearchForm')->name('memos.search');
// 検索処理&結果表示
Route::post('/memos/search', 'MemoController@search');

Route::middleware('auth')->group(function() {
    
    //初ログイン後ホーム画面 
    Route::get('/home', 'HomeController@index')->name('home');
    // 新規投稿画面表示
    Route::get('/memos/create', 'MemoController@showCreateForm')->name('memos.create');
    // 新規投稿処理
    Route::post('/memos/create', 'MemoController@create');
    //マイページ画面 
    Route::get('/user/mypage', 'MemoController@showMyPage')->name('mypage');
    
    // 閲覧制限
    Route::middleware('can:view,memo')->group(function() {
        // 編集画面
        Route::get('/memos/{memo}/edit', 'MemoController@showEditForm')->name('memos.edit');
        // 編集処理
        Route::post('/memos/{memo}/edit', 'MemoController@edit');
        //  削除処理
        Route::post('/memos/{memo}/destroy', 'MemoController@destroy')->name('memos.destroy');

    });
});