<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Bank;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\MissingExchangeRateException;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{

    /*public function test_should_convert_eur_to_usd()
        {
            $bank = (new BankBuilder())
                ->withExchangeRate(Currency::EUR(), Currency::USD(), 1.2)
                ->build();

            $valueConvert = $bank->convert(10, Currency::EUR(), Currency::USD());

            $this->assertEquals(12, $valueConvert);
        } */

    public function test_should_convert_eur_to_usd()
    {
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        $valueConvert =  $bank->convert(10, Currency::EUR(), Currency::USD());

        $this->assertEquals(12, $valueConvert);

        $bank = Bank::create(Currency::USD(), Currency::EUR(), 0.82);

        $valueConvert2 =  $bank->convert(12, Currency::USD(), Currency::EUR());

        $this->assertEquals(10, $valueConvert2);
    }

    public function test_should_convert_eur_to_eur()
    {
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        $valueConvert = $bank->convert(10, Currency::EUR(), Currency::EUR());

        $this->assertEquals(10, $valueConvert);
    }

    public function test_should_convert_throws_exception_on_missing_exchange_rate()
    {
        $this->expectException(MissingExchangeRateException::class);
        $this->expectExceptionMessage('EUR->KRW');

        Bank::create(Currency::EUR(), Currency::USD(), 1.2)->convert(10, Currency::EUR(), Currency::KRW());
    }

    public function test_should_convert_with_different_exchange_rates()
    {
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        $this->assertEquals(12, $bank->convert(10, Currency::EUR(), Currency::USD()));

        $bank->addEchangeRate(Currency::EUR(), Currency::USD(), 1.3);

        $this->assertEquals(13, $bank->convert(10, Currency::EUR(), Currency::USD()));
    }
}
