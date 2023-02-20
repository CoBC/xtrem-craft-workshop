<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Bank;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\MissingExchangeRateException;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{

<<<<<<< HEAD
    public function test_should_convert_eur_to_usd()
=======
    public function test_convert_eur_to_usd_returns_float()
>>>>>>> 888da0c98d046e28006b92c8ca5a49a4e18ce7c0
    {
        $this->assertEquals(12, Bank::create(Currency::EUR(), Currency::USD(), 1.2)->convert(10, Currency::EUR(), Currency::USD()));
    }

<<<<<<< HEAD
    public function test_should_convert_eur_to_eur()
=======
    public function test_convert_eur_to_eur_returns_same_value()
>>>>>>> 888da0c98d046e28006b92c8ca5a49a4e18ce7c0
    {
        $this->assertEquals(10, Bank::create(Currency::EUR(), Currency::USD(), 1.2)->convert(10, Currency::EUR(), Currency::EUR()));
    }

<<<<<<< HEAD
    public function test_should_convert_throws_exception_on_missing_exchange_rate()
=======
    public function test_convert_throws_exception_on_missing_exchange_rate()
>>>>>>> 888da0c98d046e28006b92c8ca5a49a4e18ce7c0
    {
        $this->expectException(MissingExchangeRateException::class);
        $this->expectExceptionMessage('EUR->KRW');

        Bank::create(Currency::EUR(), Currency::USD(), 1.2)->convert(10, Currency::EUR(), Currency::KRW());
    }

<<<<<<< HEAD
    public function test_should_convert_with_different_exchange_rates()
=======
    public function test_convert_with_different_exchange_rates_returns_different_floats()
>>>>>>> 888da0c98d046e28006b92c8ca5a49a4e18ce7c0
    {
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        $this->assertEquals(12, $bank->convert(10, Currency::EUR(), Currency::USD()));

        $bank->addEchangeRate(Currency::EUR(), Currency::USD(), 1.3);

        $this->assertEquals(13, $bank->convert(10, Currency::EUR(), Currency::USD()));
    }
}
