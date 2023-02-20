<?php

namespace MoneyProblem\Domain;

class MissingExchangeRateException extends \Exception
{

    /**
     * @param Currency $currencySource
     * @param Currency $currencyTarget
     */
    public function __construct(Currency $currencySource, Currency $currencyTarget)
    {
        parent::__construct(sprintf('%s->%s', $currencySource, $currencyTarget));
    }
}
