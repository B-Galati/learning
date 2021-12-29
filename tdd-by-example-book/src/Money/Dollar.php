<?php

declare(strict_types=1);

namespace App\Money;

final class Dollar extends Money
{
    public function currency(): string
    {
        return 'USD';
    }
}
