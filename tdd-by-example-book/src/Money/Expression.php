<?php

declare(strict_types=1);

namespace App\Money;

interface Expression
{
    public function reduce(string $to): Money;
}
