<?php

namespace App\Services\CurrencyExchange\Drivers;

use App\Models\Currency;
use App\Services\CurrencyExchange\Model\Exchange;

abstract class BaseDriver
{
    abstract public function convert(Currency $baseCurrency, float $amount, Currency $exchangeCurrency): Exchange;

    public static function getDriverName(): string
    {
        return static::DRIVER_NAME;
    }
}
