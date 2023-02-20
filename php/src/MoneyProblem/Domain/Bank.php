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
     * @param Currency $currencySource est la devise d'origine
     * @param Currency $currencyTarget est la devise de destination
     * @param float $rate
     * @return Bank
     */
    public static function create(Currency $currencySource, Currency $currencyTarget, float $rate)
    {
        $bank = new Bank([]);
        $bank->addEchangeRate($currencySource, $currencyTarget, $rate);
        return $bank;
    }

    /**
     * @param Currency $currencySource
     * @param Currency $currencyTarget
     * @param float $rate
     * @return void
     */



    public function addEchangeRate(Currency $currencySource, Currency $currencyTarget, float $rate): void
    {
        $this->exchangeRates[($currencySource . '->' . $currencyTarget)] = $rate;
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
        if (!$this->currencyExist($currencySource, $currencyTarget)) {
            throw new MissingExchangeRateException($currencySource, $currencyTarget);
        }
        return $currencySource == $currencyTarget
            ? $amount
            : $amount * $this->exchangeRates[($currencySource . '->' . $currencyTarget)];
    }



    private function currencyExist($currencySource, $currencyTarget): bool
    {
        return ($currencySource == $currencyTarget || array_key_exists($currencySource . '->' . $currencyTarget, $this->exchangeRates));
    }
}
