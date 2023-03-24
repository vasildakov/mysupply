<?php

declare(strict_types=1);


namespace VasilDakov\MySupply\Domain;

/**
 * Class Money
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Money
{
    private string $amount;

    private Currency $currency;

    public function __construct($amount, Currency $currency)
    {
    }
}
