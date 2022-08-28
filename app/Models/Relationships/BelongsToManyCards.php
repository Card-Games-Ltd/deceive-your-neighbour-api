<?php

namespace App\Models\Relationships;

use App\Models\Card;
use App\Models\CardGame;

trait BelongsToManyCards
{
    public function cards(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Card::class)
            ->using(CardGame::class)
            ->withPivot(['user_id', 'is_active', 'position']);
    }
}
