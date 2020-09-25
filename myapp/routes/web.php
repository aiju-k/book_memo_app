<?php
use Illuminate\Support\Facades\Route;
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

//初ログイン後ホーム画面 
Route::get('/', 'HomeController@index')->name('home');
//一覧画面 
Route::get('/memos/index', 'MemoController@index')->name('memos.index');
// 新規投稿画面表示
Route::get('/memos/create', 'MemoController@showCreateForm')->name('memos.create');
 // 新規投稿処理
Route::post('/memos/create', 'MemoController@create');
// 編集画面
Route::get('/memos/{id}/edit', 'MemoController@showEditForm')->name('memos.edit');
 // 編集処理
 Route::post('/memos/{id}/edit', 'MemoController@edit');
 //  削除処理
 Route::post('/memos/{id}/delete', 'MemoController@delete')->name('memos.delete');
 //一覧画面 
Route::get('/memos/{id}/detail', 'MemoController@showDetail')->name('memos.detail');
