<?php

namespace App\Services\CurrencyExchange\Drivers;

use App\Models\Currency;
use App\Services\CurrencyExchange\Models\Exchange;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExternalDriver extends BaseDriver
{
    public const DRIVER_NAME = 'external';

    protected string $url;

    protected string $apikey;

    public function __construct()
    {
        $this->url = config('exchange.external.url');

        $this->apikey = config('exchange.external.apikey');
    }

    public function convert(Currency $baseCurrency, float $amount, Currency $exchangeCurrency): Exchange
    {
        $response = Http::get($this->url, [
            'access_key' => $this->apikey,
            'from' => $baseCurrency->symbol,
            'to' => $exchangeCurrency->symbol,
            'amount' => $amount,
            ]);

        if ($response->successful()) {
            return new Exchange($exchangeCurrency, $response->body()['result']);
        } else {
            Log::error($response->body(), [__METHOD__]);
            return $response->throw();
        }
    }
}
