<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Money;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\MoneyCalculator;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function test_create_money_object()
    {
        $money = new Money(10, Currency::USD());

        $this->assertInstanceOf(Money::class, $money);
        $this->assertEquals(10, $money->getAmount());
        $this->assertEquals(Currency::USD(), $money->getCurrency());
    }

    public function test_should_add_in_usd()
    {
        $this->assertIsFloat(MoneyCalculator::add(5, Currency::USD(), 10));
        $this->assertNotNull(MoneyCalculator::add(5, Currency::USD(), 10));
    }

    public function test_should_multiply_in_euros()
    {
        $this->assertLessThan(MoneyCalculator::times(10, Currency::USD(), 2), 0);
    }

    public function test_should_divide_in_korean_won()
    {
        $this->assertEquals(MoneyCalculator::divide(4002, Currency::USD(), 4), 1000.5);
    }
}
