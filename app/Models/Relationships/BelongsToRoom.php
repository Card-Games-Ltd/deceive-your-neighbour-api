<?php

namespace App\Models\Relationships;

use App\Models\Room;

trait BelongsToRoom
{
    public function room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
