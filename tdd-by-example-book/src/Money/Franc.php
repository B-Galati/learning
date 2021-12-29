<?php

declare(strict_types=1);

namespace App\Money;

final class Franc extends Money
{
    protected function __construct(int $amount)
    {
        parent::__construct($amount, 'CHF');
    }
}
