<?php

declare(strict_types=1);

namespace Test\Money;

use App\Money\Dollar;
use PHPUnit\Framework\TestCase;

final class MoneyTest extends TestCase
{
    public function testMultiplication(): void
    {
        $five = new Dollar(5);
        $five->times(2);
        $this->assertSame(10, $five->amount);
        $five->times(3);
        $this->assertSame(15, $five->amount);
    }
}
