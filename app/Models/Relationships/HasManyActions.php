<?php

namespace App\Models\Relationships;

use App\Models\Action;

trait HasManyActions
{
    public function actions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Action::class);
    }
}
