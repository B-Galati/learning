<?php

declare(strict_types=1);

namespace App\Money;

final class Franc extends Money
{
    public function currency(): string
    {
        return 'CHF';
    }
}
