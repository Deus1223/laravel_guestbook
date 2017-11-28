<?php

namespace App\Repositories;

use App\User;

class MessageRepository
{
    /**
     * Get all of the messages for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->messages()
                    ->orderBy('created_at', 'asc')
                    ->get();
        /** 這樣也可
         *return Message::where('user_id', $user->id)
         *            ->orderBy('created_at', 'asc')
         *            ->get();
         */
    }
}
