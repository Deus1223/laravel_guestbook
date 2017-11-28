<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Message; // 新增

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    # by Deus
    public function destroy(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }
}
