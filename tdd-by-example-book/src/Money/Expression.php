<?php

declare(strict_types=1);

namespace App\Money;

interface Expression
{
    public function plus(Expression $money): Expression;
    public function reduce(Bank $bank, string $to): Money;
    public function times(int $times): Expression;
}
