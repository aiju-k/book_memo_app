<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoRequest extends FormRequest
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
     * 各項目名を設定
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'book' => '著書名',
            'author' => '作者',
            'title' => 'メモのタイトル',
            'content' => '内容',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'book' => 'required | max:50',
            'author' => 'required | max:50',
            'title' => 'required | max:100',
            'content' => 'required',
        ];
    }
}
