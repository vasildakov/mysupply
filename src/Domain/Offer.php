<?php 

declare(strict_types=1);

namespace VasilDakov\MySupply\Domain;

/**
 * Class Offer
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Offer {

    readonly string $name; // Offer A, Offer B, Offer C

    readonly float $price;

    public function __construct(string $name, float $price)
    {
        $this->name  = $name;
        $this->price = $price;
    }
}

