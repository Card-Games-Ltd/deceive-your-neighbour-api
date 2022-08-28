<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActionType extends BaseModel
{
    use HasFactory;

    const TRUST_TYPE = 'TRUST';
    const CHECK_TYPE = 'CHECK';
    const CHOOSE_FROM_HAND_TYPE = 'CHOOSE_FROM_HAND';
    const CHOOSE_FROM_TABLE_TYPE = 'CHOOSE_FROM_TABLE';

    public static function next($type): ?string
    {
        switch ($type) {
            case self::TRUST_TYPE:
                return self::CHOOSE_FROM_HAND_TYPE;
            case self::CHECK_TYPE:
                return self::CHOOSE_FROM_TABLE_TYPE;
            case self::CHOOSE_FROM_HAND_TYPE:
            case self::CHOOSE_FROM_TABLE_TYPE:
            default:
                return null;
        }
    }
}
