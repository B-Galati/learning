<?php

declare(strict_types=1);

namespace App\Money;

abstract class Money
{
    protected int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $times): self
    {
        return new static($this->amount * $times);
    }

    public function equals(Money $money): bool
    {
        return $this->amount === $money->amount;
    }
}
