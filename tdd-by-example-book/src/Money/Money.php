<?php

declare(strict_types=1);

namespace App\Money;

use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

#[Immutable]
final class Money implements Expression
{
    private function __construct(protected readonly int $amount, protected readonly string $currency)
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
        return new self($this->amount + $money->amount, $this->currency);
    }
}
