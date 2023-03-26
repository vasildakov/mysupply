# mysupply
mysupply Back End Task

## Requirements
```
PHP 8.1
```

## Installation
```
$ git clone git@github.com:vasildakov/mysupply.git

$ composer install
```

## Data
The data is located in `./data` folder, and it is available in three different formats: `xml`, `json` and `yaml`


## Unit Tests

```
$ composer test

> ./vendor/bin/phpunit --coverage-html ./build/coverage
PHPUnit 9.6.5 by Sebastian Bergmann and contributors.

.......................                                           23 / 23 (100%)

Time: 00:00.247, Memory: 20.00 MB

OK (23 tests, 23 assertions)

Generating code coverage report in HTML format ... done [00:00.106]

```

## Build

After running `composer test` code coverage report will be generated in the `./build` folder.

## Cli

The cli command takes two arguments: the name of the file and the extension:

```
php public/console.php app:create-auctions data json|xml|yaml
```

```
+------------------------+---------+---------+---------+
| Negotiation 1                                        |
+------------------------+---------+---------+---------+
| Requested Item         | Offer A | Offer B | Offer C |
+------------------------+---------+---------+---------+
| 100 tons of steel JSON | 200000  | 190000  | 195000  |
| 50 tons of nickel JSON | 400000  | 380000  | 390000  |
+------------------------+---------+---------+---------+

+-------------------+---------+---------+
| Negotiation 2                         |
+-------------------+---------+---------+
| Requested Item    | Offer A | Offer B |
+-------------------+---------+---------+
| 250 screw drivers | 20000   | 15000   |
+-------------------+---------+---------+

+---------------------------+---------+---------+
| Negotiation 3                                 |
+---------------------------+---------+---------+
| Requested Item            | Offer A | Offer C |
+---------------------------+---------+---------+
| 200 liters of machine oil | 40000   | 38000   |
+---------------------------+---------+---------+
```