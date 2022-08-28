<?php

namespace App\Models\Relationships;

use App\Models\User;

trait BelongsToUser
{
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
