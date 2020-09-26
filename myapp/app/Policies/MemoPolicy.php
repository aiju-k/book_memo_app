<?php

namespace App\Policies;

use App\User;
use App\Memo;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemoPolicy
{
    use HandlesAuthorization;

    /**
     * メモの閲覧制限(編集画面)
     *
     * @return void
     */
    public function view(User $user, Memo $memo)
    {
        return $user->id === $memo->user_id;
    }
}
