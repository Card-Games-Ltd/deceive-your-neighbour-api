<?php

namespace App\Models\Relationships;

use App\Models\User;

trait BelongsToHost
{
    public function host(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'host_id');
    }
}
