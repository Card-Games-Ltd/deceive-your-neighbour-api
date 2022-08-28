<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CardSeeder::class);
        $this->call(ActionTypeSeeder::class);
    }
}
