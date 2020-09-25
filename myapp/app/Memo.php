<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Memo extends Model
{
    //テーブル関連付け
    protected $table = 'memos';

    // 変更可能な変数
    protected $fillable = [
        'book', 'author', 'title', 'content',
    ];

    /**
     * 最終更新日のフォーマット
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])
        ->format('Y/m/d');    
    }

}
