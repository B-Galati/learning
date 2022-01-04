<?php

declare(strict_types=1);

namespace App\Money;

use JetBrains\PhpStorm\Pure;

final class Bank
{
    /**
     * @var array<string, int>
     */
    private array $rates;

    #[Pure]
    public function reduce(Expression $source, string $to): Money
    {
        return $source->reduce($this, $to);
    }

    public function addRate(string $from, string $to, int $rate): void
    {
        $this->rates["$from.$to"] = $rate;
    }

    public function rate(string $from, string $to): int
    {
        if ($from === $to) {
            return 1;
        }

        return $this->rates["$from.$to"] ?? throw new \LogicException('Undefined rate');
    }
}
