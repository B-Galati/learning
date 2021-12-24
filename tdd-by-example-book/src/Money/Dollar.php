<?php

declare(strict_types=1);

namespace App\Money;

final class Dollar
{
    public int $amount = 10;

    public function __construct(int $amount)
    {
    }

    public function times(int $times): void
    {
    }
}
