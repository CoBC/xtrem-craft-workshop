<?php
namespace MoneyProblem\Domain;
use MoneyProblem\Domain\Currency;

class Money
{
    private $amount;
    private $currency;

    public function __construct(float $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
