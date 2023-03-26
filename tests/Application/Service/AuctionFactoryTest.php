<?php

declare(strict_types=1);

namespace VasilDakov\MySupplyTest\Application\Service;

use PHPUnit\Framework\TestCase;
use VasilDakov\MySupply\Application\Service\AuctionFactory;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\JsonReader;

/**
 * Class AuctionFactoryTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class AuctionFactoryTest extends TestCase
{
    public function testItCanBeInstantiated(): void
    {
        $instance = new AuctionFactory();
        $this->assertInstanceOf(AuctionFactory::class, $instance);
    }

    public function testItCanCreateAuctionsFromXml()
    {
        $array = (new JsonReader())->fromFile('./data/data.json');

        $result = (new AuctionFactory())($array);

        $this->assertIsArray($array);
    }
}