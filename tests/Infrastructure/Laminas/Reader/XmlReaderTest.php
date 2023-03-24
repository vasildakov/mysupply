<?php

declare(strict_types=1);


namespace VasilDakov\MySupplyTest\Infrastructure\Laminas\Reader;

use PHPUnit\Framework\TestCase;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\XmlReader;

/**
 * Class XmlReaderTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright 2009-2022 Neutrino.bg
 * @version 1.0
 */
final class XmlReaderTest extends TestCase
{
    public function testItCanReadXmlFile()
    {
        $reader = new XmlReader();
        $data   = $reader->fromFile('./data/data.xml');
        $this->assertIsArray($data);
    }
}