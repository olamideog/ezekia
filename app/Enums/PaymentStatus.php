<?php

namespace App\Enums;

enum PaymentStatus: int
{
    case PENDING = 0;
    case SUCCESSFUL = 1;
    case FAILED = 3;
    case CANCELLED = 2;

    const DEFAULT = self::PENDING;

    public function title(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::SUCCESSFUL => 'Successful',
            self::FAILED => 'Failed',
            self::CANCELLED => 'Cancelled',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::PENDING => 'badge-secondary',
            self::SUCCESSFUL => 'badge-success',
            self::FAILED => 'badge-danger',
            self::CANCELLED => 'badge-info',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::PENDING => 'dripicons-case',
            self::SUCCESSFUL => 'dripicons-checkmark',
            self::FAILED => 'dripicons-cross',
            self::CANCELLED => 'dripicons-archive',
        };
    }
}
