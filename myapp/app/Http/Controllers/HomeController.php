<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //ホーム画面を返す
    public function index()
    {
        $user = DB::table('users')->first();

        return view('home', [
            'user' => $user
        ]);
    }
}
