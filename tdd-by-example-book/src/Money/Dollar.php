<?php

declare(strict_types=1);

namespace App\Money;

final class Dollar extends Money
{
    private string $currency = 'USD';

    public function currency(): string
    {
        return $this->currency;
    }
}
