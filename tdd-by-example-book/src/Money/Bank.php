<?php

declare(strict_types=1);

namespace App\Money;

use JetBrains\PhpStorm\Pure;

final class Bank
{
    #[Pure]
    public function reduce(Expression $source, string $to): Money
    {
        return $source->reduce($to);
    }

    public function addRate(string $currencyFrom, string $currencyTo, int $rate): void
    {
    }
}
