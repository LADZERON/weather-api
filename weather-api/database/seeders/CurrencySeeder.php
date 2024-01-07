<?php

namespace Database\Seeders;

use App\Helpers\CurrencyConstans;
use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        array_walk(CurrencyConstans::$currencyCodes, function ($code, $isoCode) {
            Currency::create([
                Currency::CODE => $code,
                Currency::ISO_CODE => $isoCode,
            ]);
        });
    }
}
