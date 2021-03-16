<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Memo;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * 会員登録ができるかどうかテスト
     *
     * @return void
     */
    public function testCreate()
    {
        $user = [
            "name" => "name",
            "email" => "test@email.com",
            "password" => "pass",
        ];
        // formからpost送信するため配列に変換
        // $user = (array)$user;
        $response = $this->post('/register', $user);
        // $user = (object)$user;
        $response->assertRedirect('/');
    }
    /**
     * ログインができるかどうかテスト
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(User::class)->create();
        $user = (array)$user;
        $response = $this->post('/login', $user);
        $user = (object)$user;
        $response->assertRedirect('/');
    }
}
