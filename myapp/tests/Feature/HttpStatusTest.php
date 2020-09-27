<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Memo;

class HttpStatusTest extends TestCase
{
    // テスト実行中に有効なトランザクションを設定
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        // ページにアクセス
        $response = $this->get('/login');
        $response->assertStatus(200)
                 ->assertSee('ログイン画面');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $response = $this->get('/register');
        $response->assertStatus(200)
                 ->assertSee('会員登録');
    }

    /**
     * マイページにアクセス
     *
     * @return void
     */
    public function testMypage()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get(route('mypage'));

        $response->assertStatus(200)
        ->assertSee("<h1>".$user->name."さんの投稿一覧</h1>");
    }

    /**
     * 一覧にアクセス
     *
     * @return void
     */
    public function testIndex()
    {
        // ログイン前
        
        // ログイン後
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get(route('memos.index'));

        $response->assertStatus(200)
                 ->assertSee('<h1 class="text-success text-center">メモ投稿一覧</h1>');
    }
    /**
     * 投稿画面にアクセス
     *
     * @return void
     */
    public function testCreateForm()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get(route('memos.create'));

        $response->assertStatus(200)
                 ->assertSee('<h1 class="text-success text-center">メモ投稿画面</h1>');
    }
 
}
