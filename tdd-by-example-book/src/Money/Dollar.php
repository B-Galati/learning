<?php

declare(strict_types=1);

namespace App\Money;

final class Dollar
{
    private int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $times): self
    {
        return new self($this->amount * $times);
    }

    public function equals(Dollar $dollar): bool
    {
        return $this->amount === $dollar->amount;
    }
}
