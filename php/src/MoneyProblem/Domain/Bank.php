<?php

namespace MoneyProblem\Domain;

use function array_key_exists;

class Bank
{
    private $exchangeRates = [];

    /**
     * @param array $exchangeRates
     */
    public function __construct(array $exchangeRates = [])
    {
        $this->exchangeRates = $exchangeRates;
    }

    /**
     * @param Currency $currency1 est la devise d'origine
     * @param Currency $currency2 est la devise de destination
     * @param float $rate
     * @return Bank
     */
    public static function create(Currency $currency1, Currency $currency2, float $rate)
    {
        $bank = new Bank([]);
        $bank->addEchangeRate($currency1, $currency2, $rate);
        return $bank;
    }

    /**
     * @param Currency $currency1
     * @param Currency $currency2
     * @param float $rate
     * @return void
     */



    public function addEchangeRate(Currency $currency1, Currency $currency2, float $rate): void
    {
        $this->exchangeRates[($currency1 . '->' . $currency2)] = $rate;
    }

    /**
     * @param float $amount
     * @param Currency $currencySource
     * @param Currency $currencyTarget
     * @return float
     * @throws MissingExchangeRateException
     */



    public function convert(float $amount, Currency $currencySource, Currency $currencyTarget): float
    {
        if (!$this->CurrencyExist($currencySource,$currencyTarget)) {
            throw new MissingExchangeRateException($currencySource, $currencyTarget);
        }
        return $currencySource == $currencyTarget
            ? $amount
            : $amount * $this->exchangeRates[($currencySource . '->' . $currencyTarget)];
    }

    private function CurrencyExist($currencySource, $currencyTarget): bool{

        return ($currencySource == $currencyTarget || array_key_exists($currencySource . '->' . $currencyTarget, $this->exchangeRates));
    }

}