<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            'name' => 'Great British Pounds',
            'code' => 'GBP',
            'symbol' => '£',
        ]);
        DB::table('currencies')->insert([
            'name' => 'United State Dollar',
            'code' => 'USD',
            'symbol' => '$',
        ]);
        DB::table('currencies')->insert([
            'name' => 'European Euro',
            'code' => 'EUR',
            'symbol' => '€',
        ]);
    }
}
