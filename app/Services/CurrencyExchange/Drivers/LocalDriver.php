<?php

namespace App\Services\CurrencyExchange\Drivers;

use App\Models\Currency;
use App\Services\CurrencyExchange\Models\Exchange;

class LocalDriver extends BaseDriver
{
    public const DRIVER_NAME = 'local';

    public function convert(Currency $baseCurrency, float $amount, Currency $exchangeCurrency): Exchange
    {
        $finalCurrencyWithRate = $baseCurrency->rates()->where('exchange_currency_id', $exchangeCurrency->id)->first();

        $convertedAmount = $finalCurrencyWithRate->rate * $amount;

        return new Exchange($finalCurrencyWithRate, $convertedAmount);
    }
}
