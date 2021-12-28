<?php

declare(strict_types=1);

namespace App\Money;

use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

#[Immutable]
abstract class Money
{
    protected int $amount;

    protected function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public static function dollar(int $amount): Money
    {
        return new Dollar($amount);
    }

    public static function franc(int $amount): Money
    {
        return new Franc($amount);
    }

    #[Pure]
    public function times(int $times): static
    {
        return new static($this->amount * $times);
    }

    public function equals(Money $money): bool
    {
        return
            get_class($money) === get_class($this)
            && $this->amount === $money->amount;
    }
}
