<?php

namespace App\Models;

use App\Models\Relationships\BelongsToCard;
use App\Models\Relationships\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CardGame extends Pivot
{
    public $incrementing = true;

    use HasFactory;
    use BelongsToCard, BelongsToUser;
}
