<?php
declare(strict_types=1);

namespace App\Money;

final class Sum implements Expression
{
    public function __construct(private Expression $augend, private Expression $addend)
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

    public function plus(Expression $money): Expression
    {
        return new Sum($this, $money);
    }

    public function times(int $times): Expression
    {
        return new Sum($this->augend->times($times), $this->addend->times($times));
    }
}
