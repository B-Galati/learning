<?php

declare(strict_types=1);

namespace App\Money;

use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

#[Immutable]
class Money
{
    public function __construct(protected readonly int $amount, protected readonly string $currency)
    {
    }

    public static function dollar(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    public static function franc(int $amount): Money
    {
        return new Money($amount, 'CHF');
    }

    #[Pure]
    public function times(int $times): self
    {
        return new Money($this->amount * $times, $this->currency);
    }

    public function equals(Money $money): bool
    {
        return
            $this->currency === $money->currency
            && $this->amount === $money->amount;
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
