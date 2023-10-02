<?php

namespace App\Services\CurrencyExchange\Models;

use App\Models\Currency;

class Exchange
{
    public Currency $currency;

    public float $amount;

    public function __construct(Currency $currency, float $amount)
    {
        $this->currency = $currency;

        $this->amount = $amount;
    }

    public function getString()
    {
        return sprintf('%s %1\$.2f', $this->currency->symbol, $this->amount);
    }
}
