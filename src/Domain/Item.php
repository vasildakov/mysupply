<?php 

declare(strict_types=1);

namespace VasilDakov\MySupply\Domain;

/**
 * Class Item
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Item {

    readonly string $name;

    private array $offers = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addOffer(Offer $offer): void {
        $this->offers[$offer->name] = $offer;
    }

    public function getOffers(): array {
        return $this->offers;
    }
}
