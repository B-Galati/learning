<?php

declare(strict_types=1);

namespace App\Money;

final class Dollar extends Money
{
    protected function __construct(int $amount)
    {
        parent::__construct($amount, 'USD');
    }
}
