<?php

declare(strict_types=1);

namespace VasilDakov\MySupplyTest\Application\Service;

use PHPUnit\Framework\TestCase;
use VasilDakov\MySupply\Application\Service\Reader;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\JsonReader;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\ReaderInterface;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\XmlReader;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\YamlReader;

/**
 * Class ReaderTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class ReaderTest extends TestCase
{
    protected $adapter;

    protected function setUp(): void
    {
        $this->adapter = $this->getMockForAbstractClass(ReaderInterface::class);

        parent::setUp();
    }

    public function testItCanBeInstantiated(): void
    {
        $instance = new Reader($this->adapter);

        $this->assertInstanceOf(Reader::class, $instance);
    }

    public function testItCanGetTheAdapter(): void
    {
        $instance = new Reader($this->adapter);

        $this->assertInstanceOf(ReaderInterface::class, $instance->getAdapter());
    }

    public function testItCanReadJsonFile(): void
    {
        $array = (new Reader(new JsonReader()))('data', 'json');

        $this->assertIsArray($array);
    }

    public function testItCanReadXmlFile(): void
    {
        $array = (new Reader(new XmlReader()))('data', 'xml');

        $this->assertIsArray($array);
    }

    public function testItCanReadYamlFile(): void
    {
        $array = (new Reader(new YamlReader()))('data', 'yaml');

        $this->assertIsArray($array);
    }

    public function testFileDoesNotExistOrIsNotReadable(): void
    {
        $this->expectException(\RuntimeException::class);

        (new Reader(new YamlReader()))('data', 'csv');
    }

}