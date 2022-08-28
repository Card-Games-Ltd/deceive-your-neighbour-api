<?php

namespace App\Models;

use App\Models\Relationships\BelongsToRoom;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends BaseModel
{
    use HasFactory;
    use BelongsToRoom;

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot(['action_id']);
    }

    public function currentExecutor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'current_executor_id');
    }

    public function previousExecutor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'previous_executor_id');
    }

    public function currentAction(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Action::class, 'current_action_id');
    }
}
