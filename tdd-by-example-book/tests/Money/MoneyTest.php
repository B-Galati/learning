<?php

declare(strict_types=1);

namespace Test\Money;

use App\Money\Dollar;
use App\Money\Franc;
use PHPUnit\Framework\TestCase;

final class MoneyTest extends TestCase
{
    public function testDollarMultiplication(): void
    {
        $five = new Dollar(5);
        $this->assertEquals(new Dollar(10), $five->times(2));
        $this->assertEquals(new Dollar(15), $five->times(3));
    }

    public function testDollarEquality(): void
    {
        $this->assertTrue((new Dollar(5))->equals(new Dollar(5)));
        $this->assertFalse((new Dollar(5))->equals(new Dollar(6)));
    }

    public function testFrancMultiplication(): void
    {
        $five = new Franc(5);
        $this->assertEquals(new Franc(10), $five->times(2));
        $this->assertEquals(new Franc(15), $five->times(3));
    }

    public function testFrancEquality(): void
    {
        $this->assertTrue((new Franc(5))->equals(new Franc(5)));
        $this->assertFalse((new Franc(5))->equals(new Franc(6)));
    }
}
