<?php

declare(strict_types=1);


namespace VasilDakov\MySupplyTest\Infrastructure\Laminas\Reader;

use PHPUnit\Framework\TestCase;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\JsonReader;

/**
 * Class JsonReaderTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright 2009-2022 Neutrino.bg
 * @version 1.0
 */
final class JsonReaderTest extends TestCase
{
    public function testItCanReadJsonFile()
    {
        $reader = new JsonReader();
        $data   = $reader->fromFile('./data/data.json');
        $this->assertIsArray($data);
    }
}