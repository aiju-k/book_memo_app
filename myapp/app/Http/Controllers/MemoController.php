<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoController extends Controller
{
    //一覧表示
    public function index() {
        return view('app/memos');
    }
}
