<?php

namespace App\Models;

use App\Models\Relationships\BelongsToHost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends BaseModel
{
    use HasFactory;
    use BelongsToHost;
    use SoftDeletes;

    const DEFAULT_PLAYERS_NUMBER = 3; // as minimum
}
