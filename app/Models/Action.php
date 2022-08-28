<?php

namespace App\Models;

use App\Models\Relationships\BelongsToActionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Action extends BaseModel
{
    use HasFactory;
    use BelongsToActionType;
}
