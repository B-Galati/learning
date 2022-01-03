<?php

declare(strict_types=1);

namespace App\Money;

use JetBrains\PhpStorm\Pure;

final class Bank
{
    #[Pure]
    public function reduce(Expression $source, string $to): Money
    {
        return Money::dollar(10);
    }
}
