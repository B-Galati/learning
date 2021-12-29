<?php

declare(strict_types=1);

namespace App\Money;

final class Franc extends Money
{
    private string $currency = 'CHF';

    public function currency(): string
    {
        return $this->currency;
    }
}
