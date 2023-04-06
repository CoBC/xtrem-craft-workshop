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

#### Round tripping