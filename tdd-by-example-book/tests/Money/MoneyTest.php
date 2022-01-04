<?php

declare(strict_types=1);

namespace Test\Money;

use App\Money\Bank;
use App\Money\Money;
use App\Money\Sum;
use PHPUnit\Framework\TestCase;

final class MoneyTest extends TestCase
{
    public function testMultiplication(): void
    {
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality(): void
    {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    public function testCurrency(): void
    {
        $this->assertSame('USD', Money::dollar(1)->currency());
        $this->assertSame('CHF', Money::franc(1)->currency());
    }

    public function testSimpleAddition(): void
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(10), $reduced);
    }

    public function testPlusReturnsSum(): void
    {
        // TODO delete this test once useless
        $five = Money::dollar(5);
        $result = $five->plus($five);
        $this->assertInstanceOf(Sum::class, $result);
        $this->assertSame($five, $result->augend);
        $this->assertSame($five, $result->addend);
    }

    public function testReduceSum(): void
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(7), $reduced);
    }

    public function testReduceMoney(): void
    {
        $bank = new Bank();
        $reduced = $bank->reduce(Money::dollar(1), 'USD');
        $this->assertEquals(Money::dollar(1), $reduced);
    }

    public function testReduceMoneyDifferentCurrency(): void
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $reduced = $bank->reduce(Money::franc(2), 'USD');
        $this->assertEquals(Money::dollar(1), $reduced);
    }

    public function testIdentityRate(): void
    {
        $bank = new Bank();
        $this->assertEquals(1, $bank->rate('USD', 'USD'));
    }
}
