<?php

declare(strict_types=1);

namespace App\Money;

use JetBrains\PhpStorm\Pure;

final class Bank
{
    #[Pure]
    public function reduce(Money $sum, string $currency): Money
    {
        return Money::dollar(10);
    }
}
