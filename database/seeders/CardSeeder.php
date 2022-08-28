<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    const SUITS = ["♠", "♣", "♥", "♦"];
    const VALUES = [
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "10",
        "J",
        "Q",
        "K",
        "A"
    ];

    public function run()
    {
        if (!Card::query()->count()) {
            foreach (self::SUITS as $SUIT) {
                foreach (self::VALUES as $VALUE) {
                    Card::query()->create(['suit' => $SUIT, 'value' => $VALUE]);
                }
            }
        }
    }
}
