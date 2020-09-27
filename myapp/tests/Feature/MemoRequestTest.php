<?php

namespace Tests\Feature;

use App\Http\Requests\MemoRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class MemoRequestTest extends TestCase
{
    // トランザクション設定
    use DatabaseTransactions;

    /**
     * MemoRequestのバリデーション:Required
     * @return void
     */
    public function testRequired()
    {
        $user = factory(User::class)->create();

        // 入力項目($col)とその値($data)
        $data = [
            'user_id' => $user->id,
            'book' => null,
            'author' => null,
            'title' => null,
            'content' => null,
        ];
        // リクエストのインスタンス作成
        $request = new MemoRequest();
        // バリデーションルール取得
        $rules = $request->rules();
        // バリデーターのインスタンス取得
        $validator = Validator::make($data, $rules);
        // バリデーションをとおす(ルールを満たしていればtrue)
        $result = $validator->passes();
        // 期待値と結果を比較
        $this->assertFalse($result);
        $expectedFailed = [
            'book' => ['Required' => [],],
            'author' => ['Required' => [],],
            'title' => ['Required' => [],],
            'content' => ['Required' => [],],
        ];

        $this->assertEquals($expectedFailed, $validator->failed());
    }
    /**
     * MemoRequestのバリデーション:Max
     * @return void
     */
    public function testMaxStr()
    {
        $user = factory(User::class)->create();

        // 入力項目($col)とその値($data)
        $data = [
            'user_id' => $user->id,
            'book' => str_repeat('a', 51),
            'author' => str_repeat('a', 51),
            'title' => str_repeat('a', 101),
            'content' => str_repeat('a', 100000),
        ];
        // リクエストのインスタンス作成
        $request = new MemoRequest();
        // バリデーションルール取得
        $rules = $request->rules();
        // バリデーターのインスタンス取得
        $validator = Validator::make($data, $rules);
        // バリデーションをとおす(ルールを満たしていればtrue)
        $result = $validator->passes();
        // 期待値と結果を比較
        $this->assertFalse($result);
        $expectedFailed = [
            'book' => ['Max' => [50],],
            'author' => ['Max' => [50],],
            'title' => ['Max' => [100],],
        ];

        $this->assertEquals($expectedFailed, $validator->failed());
    }

    // public function dataproviderExample()
    // {
    //     return [
    //         '正常' => ['title', 'タイトル', true],
    //         '必須エラー' => ['title', '', false],
    //         //str_repeat('a', 256)で、256文字の文字列を作成(aが256個できる)
    //         '最大文字数エラー' => ['title', str_repeat('a', 256), false],
    //     ];
    // }
}
