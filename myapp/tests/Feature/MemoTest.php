<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Memo;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class MemoTest extends TestCase
{
    use DatabaseTransactions;

    public function testMemoController()
    {
        $user = factory(User::class)->create();
        $memo = [
            'user_id' => $user->id,
            'book' => '告白',
            'author' => '湊かなえ',
            'title' => '怖い',
            'content' => '怖い',
        ];
        Auth::loginUsingId($user->id);
        $this->create($user, $memo);
    }

    /**
     * メモ投稿テスト
     *
     * @return void
     */
    private function create($user, $memo)
    {
        $response = $this->actingAs($user)
             ->get(route('memos.create'));
        
        $this->post('/memos/create', $memo);
        $this->assertDatabaseHas('memos', [
            'user_id' => $user->id,
            'book' => '告白',
            'author' => '湊かなえ',
            'title' => '怖い',
            'content' => '怖い',
        ]);
    }
}
