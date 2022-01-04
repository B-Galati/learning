<?php

declare(strict_types=1);

namespace App\Money;

use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

#[Immutable]
final class Money implements Expression
{
    public function __construct(public readonly int $amount, public readonly string $currency)
    {
    }

    #[Pure]
    public static function dollar(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    #[Pure]
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

    #[Pure]
    public function plus(Money $money): Expression
    {
        return new Sum($this, $money);
    }

    public function reduce(string $to): Money
    {
        $rate = 1;
        if ($this->currency === 'CHF' && $to === 'USD') {
            $rate = 2;
        }

        return new Money($this->amount / $rate, $to);
    }
}
