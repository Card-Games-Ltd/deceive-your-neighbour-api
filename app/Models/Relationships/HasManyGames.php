<?php

namespace App\Models\Relationships;

use App\Models\Game;

trait HasManyGames
{
    public function games(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Game::class);
    }
}
