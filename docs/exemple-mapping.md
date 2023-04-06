### Define Pivot Currency

```gherkin
As a Foreign Exchange Expert
I want to be able to define a Pivot Currency
So that I can express exchange rates based on it
```

#### All exchange rates are defined from the pivot currency

```gherkin
Given a Bank with EUR as pivot currency
When I define an exchange rate of 1.2 to USB
Then I can convert 10 EUR to 12 USB
```

```gherkin
Given a Bank with EUR as pivot currency
When I define an exchange rate of 1.2 to USB
Then I can convert 12 USB to 10 EUR 
```







### Add an exchange rate
```gherkin
As a Foreign Exchange Expert
I want to add/update exchange rates by specifying: a multiplier rate and a currency
So they can be used to evaluate client portfolios
```

#### Round tripping

```gherkin
Given a Bank with EUR as pivot currency 1.2 USD
When I convert 10 EUR in $
Then X$ = 10€
```






### Convert a Money
```gherkin
As a Bank Consumer
I want to convert a given amount in currency into another currency
So it can be used to evaluate client portfolios
```

```gherkin
Given a Bank with 2 same currency
When I convert 10 EUR to EUR's currency
Then the result is 10 EUR (not changed)
```
