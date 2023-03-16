<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Bank;
use MoneyProblem\Domain\Money;
use MoneyProblem\Domain\Portfolio;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\MissingExchangeRateException;
use PHPUnit\Framework\TestCase;


class PortfolioTest extends TestCase
{

    public function test_should_convert_eur_to_usd()
    {
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        $valueConvert =  $bank->convert(10, Currency::EUR(), Currency::USD());

        $this->assertEquals(12, $valueConvert);
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

    public function testEvaluation()
    {
        $portfolio = new Portfolio();
        $portfolio->add(new Money(5, new Currency('USD')));
        $portfolio->add(new Money(10, new Currency('EUR')));

        $this->assertEquals(new Money(17, new Currency('USD')), $portfolio->evaluate('USD'));
        $this->assertEquals(new Money(14.1, new Currency('EUR')), $portfolio->evaluate('EUR'));
        $this->assertEquals(new Money(18940, new Currency('KRW')), $portfolio->evaluate('KRW'));
    }
}
