<?php

namespace Database\Seeders;

use App\Models\ActionType;
use Illuminate\Database\Seeder;

class ActionTypeSeeder extends Seeder
{
    public function run()
    {
        if (!ActionType::query()->count()) {
            ActionType::query()->create(['name' => ActionType::TRUST_TYPE]);
            ActionType::query()->create(['name' => ActionType::CHECK_TYPE]);
            ActionType::query()->create(['name' => ActionType::CHOOSE_FROM_HAND_TYPE]);
            ActionType::query()->create(['name' => ActionType::CHOOSE_FROM_TABLE_TYPE]);
        }
    }
}
