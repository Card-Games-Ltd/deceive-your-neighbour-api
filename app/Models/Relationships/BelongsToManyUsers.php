<?php

namespace App\Models\Relationships;

use App\Models\User;

trait BelongsToManyUsers
{
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
