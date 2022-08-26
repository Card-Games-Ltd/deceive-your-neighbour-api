<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function createUser(string $name)
    {
        return User::query()->create(['name' => $name]);
    }

    public function getUser(string $sessionToken)
    {
        return User::query()->active()->where(['session_token' => $sessionToken])->first();
    }

    public function removeUser($id)
    {
        $user = User::query()->find($id);
        return $user->delete();
    }
}
