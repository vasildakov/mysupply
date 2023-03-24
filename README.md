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
```

## Build

After running `composer test` code coverage report will be generated in the `./build` folder.

## Cli

The cli command takes two arguments: the name of the file and the extension:

```
php public/console.php app:create-auctions data json
```