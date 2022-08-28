<?php

namespace App\Models\Relationships;

use App\Models\Card;

trait BelongsToCard
{
    public function card(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
