<?php

namespace App\Models;

use App\Models\Relationships\BelongsToHost;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends BaseModel
{
    use HasFactory;
    use BelongsToHost;

    const DEFAULT_PLAYERS_NUMBER = 3; // as minimum
}
