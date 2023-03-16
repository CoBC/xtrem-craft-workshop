<?php
namespace MoneyProblem\Domain;

use MoneyProblem\Domain\Money;
use MoneyProblem\Domain\Currency;

class Portfolio
{
    private $moneyList;

    public function __construct()
    {
        $this->moneyList = array();
    }

    public function add(Money $money)
    {
        $this->moneyList[] = $money;
    }

    public function evaluate(string $currencyCode)
    {
        $total = 0;

        foreach ($this->moneyList as $money) {
            $total += $money->getAmount() * $money->getCurrency()->getExchangeRate($currencyCode);
        }

        return new Money($total, new Currency($currencyCode));
    }
}
