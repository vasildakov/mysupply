<?php

declare(strict_types=1);


namespace VasilDakov\MySupplyTest\Infrastructure\Laminas\Reader;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Parser;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\YamlReader;

/**
 * Class YamlReaderTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class YamlReaderTest extends TestCase
{
    public function testItCanReadYamlFile()
    {
        $reader = new YamlReader();
        $data   = $reader->fromFile('./data/data.yaml');
        $this->assertIsArray($data);
    }
}