<?php

declare(strict_types=1);

namespace VasilDakov\MySupplyTest\Domain;

use PHPUnit\Framework\TestCase;
use VasilDakov\MySupply\Domain\Item;
use VasilDakov\MySupply\Domain\Offer;

/**
 * Class ItemTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class ItemTest extends TestCase
{
    public function testItCanBeInstantiated()
    {
        $instance = new Item('100 tons of steel');

        $this->assertInstanceOf(Item::class, $instance);
    }

    public function testItemMayNotHaveOffers()
    {
        $instance = new Item('100 tons of steel');
        $this->assertEmpty($instance->getOffers());
    }

    public function testOffersCanBeAdded()
    {
        $instance = new Item('100 tons of steel');
        $instance->addOffer(new Offer('Offer A', 200_000.00));
        $instance->addOffer(new Offer('Offer B', 190_000.00));
        $instance->addOffer(new Offer('Offer C', 195_000.00));

        $this->assertEquals(3, count($instance->getOffers()));
    }
}
