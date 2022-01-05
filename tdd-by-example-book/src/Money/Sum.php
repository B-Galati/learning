<?php
declare(strict_types=1);

namespace App\Money;

final class Sum implements Expression
{
    public function __construct(public Money $augend, public Money $addend)
    {
    }

    public function reduce(Bank $bank, string $to): Money
    {
        return new Money(
            $this->augend->reduce($bank, $to)->amount
            + $this->addend->reduce($bank, $to)->amount,
            $to
        );
    }
}
