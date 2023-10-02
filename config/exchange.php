<?php

use App\Models\CurrencyRate;

return [
/**
 * Exchange rate drivers. There are 2 options.
 * Options are: "local and "external"
 * "local": Will use the local database for the exchange rate
 * "external": Will use the external exchange rate
 */
    'driver' => env('EXCHANGE_DRIVER', 'local'),

    'local' => [
        'model' => CurrencyRate::class,
    ],

    'external' => [
        'url' =>  env('EXCHANGE_DRIVER_EXTERNAL_URL', 'https://api.exchangeratesapi.io/v1/convert'),
        'apikey' =>  env('EXCHANGE_DRIVER_EXTERNAL_APIKEY'),
    ]
];
