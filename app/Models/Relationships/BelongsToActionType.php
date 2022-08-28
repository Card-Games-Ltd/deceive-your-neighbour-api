<?php

namespace App\Models\Relationships;

use App\Models\ActionType;

trait BelongsToActionType
{
    public function actionType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ActionType::class);
    }
}
