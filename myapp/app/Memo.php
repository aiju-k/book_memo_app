<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    //テーブル関連付け
    protected $table = 'memos';

    // 変更可能な変数
    protected $fillable = [
        'book', 'author', 'title', 'content',
    ];

}
