<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Memo;

// メモ編集時のバリデーション
class EditMemo extends CreateMemo
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // 親クラスであるCreateMemoのルールをそのまま適用させる
        $rule = parent::rules();

        return $rule;
    }
}
