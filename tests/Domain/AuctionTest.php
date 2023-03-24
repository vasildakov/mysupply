<?php

declare(strict_types=1);


namespace VasilDakov\MySupplyTest\Domain;

use PHPUnit\Framework\TestCase;
use VasilDakov\MySupply\Domain\Auction;
use VasilDakov\MySupply\Domain\Item;

/**
 * Class AuctionTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class AuctionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testItCanBeInstantiated()
    {
        $auction = new Auction('Auction Name');
        $this->assertInstanceOf(Auction::class, $auction);
    }

    public function testLotsCanBeAddedToTheAuction()
    {
        $auction = new Auction('Auction Name');
        $auction->addItem(new Item('100 tons of steel'));
        $auction->addItem(new Item('50 tons of nickel'));
        $auction->addItem(new Item('250 screw drivers'));
        $auction->addItem(new Item('200 liters of machine oil'));

        $this->assertEquals(4, count($auction->getItems()));
    }

    public function testLotsCanBeRemovedFromAuction()
    {
        $auction = new Auction('Auction Name');
        $item = new Item('100 tons of steel');
        $auction->addItem($item);
        $auction->removeItem($item);

        $this->assertEmpty($auction->getItems());
    }
}
