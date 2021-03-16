<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Memo;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware; // csrfミドルウエアを無効化(POSTリクエストのテストのため)
class MemoTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    /**
     * メモ投稿テスト
     *
     * @return void
     */
    public function testCreate()
    {
        $user = factory(User::class)->create();
        // $memo = factory(Memo::class)->create();
        $this->actingAs($user)
             ->get(route('memos.create'));
        $memo = [
            'user_id' => $user->id,
            'book' => 'test',
            'author' => 'test',
            'title' => 'test',
            'content' => 'test',
        ];
        $response = $this->post('/memos/create', $memo);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('memos', $memo);
    }
}
