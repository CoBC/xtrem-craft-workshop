<?

use MoneyProblem\Domain\Bank;

use MoneyProblem\Domain\Currency;


class BankBuilder
{
    private $exchangeRates = [];

    public function withExchangeRate(Currency $currencySource, Currency $currencyTarget, float $rate): self
    {
        $this->exchangeRates[($currencySource . '->' . $currencyTarget)] = $rate;
        return $this;
    }

    public function build(): Bank
    {
        return new Bank($this->exchangeRates);
    }
}
