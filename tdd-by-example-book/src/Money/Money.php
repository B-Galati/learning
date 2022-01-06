<?php

declare(strict_types=1);

namespace App\Money;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class Money implements Expression
{
    public function __construct(public readonly int $amount, public readonly string $currency)
    {
    }

    public static function dollar(int $amount): self
    {
        return new self($amount, 'USD');
    }

    public static function franc(int $amount): self
    {
        return new self($amount, 'CHF');
    }

    public function times(int $times): Expression
    {
        return new self($this->amount * $times, $this->currency);
    }

    public function equals(self $money): bool
    {
        return
            $this->currency === $money->currency
            && $this->amount === $money->amount;
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function plus(Expression $money): Expression
    {
        return new Sum($this, $money);
    }

    public function reduce(Bank $bank, string $to): self
    {
        $rate = $bank->rate($this->currency, $to);

        return new self($this->amount / $rate, $to);
    }
}
