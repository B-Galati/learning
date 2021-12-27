<?php

declare(strict_types=1);

namespace App\Money;

final class Dollar
{
    public int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $times): self
    {
        return new self($this->amount * $times);
    }
}
