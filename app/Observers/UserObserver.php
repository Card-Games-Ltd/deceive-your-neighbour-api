<?php

namespace App\Observers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserObserver
{
    public function created(User $user)
    {
        if (!$user->email) {
            $user->update([
                'session_token' => uniqid(Str::random()),
                'session_token_expires_at' => Carbon::now()->addDays(User::EXPIRES_IN_DAYS)->toDateTimeString(),
            ]);
        }
    }

    public function updated(User $user)
    {
        //
    }

    public function deleted(User $user)
    {
        //
    }

    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
