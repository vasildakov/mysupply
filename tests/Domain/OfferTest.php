<?php

declare(strict_types=1);

namespace VasilDakov\MySupplyTest\Domain;

use PHPUnit\Framework\TestCase;
use VasilDakov\MySupply\Domain\Offer;

final class OfferTest extends TestCase
{
    public function testItCanBeInstantiated() 
    {
        $instance = new Offer('Offer A', 200_000);

        $this->assertInstanceOf(Offer::class, $instance);
    }
}
