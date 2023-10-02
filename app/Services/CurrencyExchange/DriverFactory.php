<?php

namespace App\Services\CurrencyExchange;

use App\Services\CurrencyExchange\Drivers\ExternalDriver;
use App\Services\CurrencyExchange\Drivers\LocalDriver;
use Illuminate\Support\Facades\App;

class DriverFactory
{
    public static function createDriver(bool $throwIfNotFound = false)
    {
        $allDrivers = self::getAllDrivers();

        $driverName = strtolower(config('exchange.driver'));

        if (! isset($allDrivers[$driverName])) {
            if ($throwIfNotFound) {
                throw new \Exception($driverName.' Exchange Driver Not Found');
            } else {
                $driverName = 'local';
            }
        }

        return App::make($allDrivers[$driverName]);
    }

    public static function getAllDrivers(): array
    {
        return [
            LocalDriver::getDriverName() => LocalDriver::class,
            ExternalDriver::getDriverName() => ExternalDriver::class,
        ];
    }
}
