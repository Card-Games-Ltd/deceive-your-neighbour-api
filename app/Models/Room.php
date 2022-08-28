<?php

namespace App\Models;

use App\Models\Relationships\BelongsToHost;
use App\Models\Relationships\BelongsToManyUsers;
use App\Models\Relationships\HasManyGames;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends BaseModel
{
    use HasFactory;
    use BelongsToHost, BelongsToManyUsers, HasManyGames;
    use SoftDeletes;

    const DEFAULT_PLAYERS_NUMBER = 3; // as minimum
}
