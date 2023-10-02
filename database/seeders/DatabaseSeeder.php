<?php

namespace Database\Seeders;

use App\Models\Currency;
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

        $currencies['GBP'] = Currency::where('code', 'GBP')->first();
        $currencies['USD'] = Currency::where('code', 'USD')->first();
        $currencies['EUR'] = Currency::where('code', 'EUR')->first();

        DB::table('currency_rates')->insert([
            'currency_id' => $currencies['GBP']->id,
            'exchange_currency_id' => $currencies['USD']->id,
            'rate' => '1.30',
        ]);

        DB::table('currency_rates')->insert([
            'currency_id' => $currencies['GBP']->id,
            'exchange_currency_id' => $currencies['EUR']->id,
            'rate' => '1.10',
        ]);

        DB::table('currency_rates')->insert([
            'currency_id' => $currencies['EUR']->id,
            'exchange_currency_id' => $currencies['GBP']->id,
            'rate' => '0.90',
        ]);

        DB::table('currency_rates')->insert([
            'currency_id' => $currencies['EUR']->id,
            'exchange_currency_id' => $currencies['USD']->id,
            'rate' => '1.20',
        ]);

        DB::table('currency_rates')->insert([
            'currency_id' => $currencies['USD']->id,
            'exchange_currency_id' => $currencies['GBP']->id,
            'rate' => '0.70',
        ]);

        DB::table('currency_rates')->insert([
            'currency_id' => $currencies['USD']->id,
            'exchange_currency_id' => $currencies['EUR']->id,
            'rate' => '0.80',
        ]);
    }
}
