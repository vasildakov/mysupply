<?php

declare(strict_types=1);


namespace VasilDakov\MySupplyTest\Application\Service;

use PHPUnit\Framework\TestCase;
use VasilDakov\MySupply\Application\Service\ReaderFactory;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\JsonReader;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\XmlReader;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\YamlReader;

/**
 * Class ReaderFactoryTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class ReaderFactoryTest extends TestCase
{
    public function testItCanBeInstantiated(): void
    {
        $factory = new ReaderFactory();
        $this->assertInstanceOf(ReaderFactory::class, $factory);
    }

    public function testItCanReturnJsonAdapter(): void
    {
        $reader = (new ReaderFactory())('json');
        $this->assertInstanceOf(JsonReader::class, $reader->adapter);
    }

    public function testItCanReturnYamlAdapter(): void
    {
        $reader = (new ReaderFactory())('yaml');
        $this->assertInstanceOf(YamlReader::class, $reader->adapter);
    }

    public function testItCanReturnXmlAdapter(): void
    {
        $reader = (new ReaderFactory())('xml');
        $this->assertInstanceOf(XmlReader::class, $reader->adapter);
    }
}