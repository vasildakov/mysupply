<?php

declare(strict_types=1);

namespace VasilDakov\MySupply\Application\Service;

use VasilDakov\MySupply\Infrastructure\Laminas\Reader\JsonReader;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\XmlReader;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\YamlReader;

/**
 * Class ReaderFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class ReaderFactory
{
    public function __invoke(string $extension): Reader
    {
        if (!Format::from($extension)) {
            throw new \InvalidArgumentException(
                "Format is not supported!"
            );
        }

        switch ($extension):
            case "json":
                $adapter = new JsonReader();
                break;
            case "yaml":
                $adapter = new YamlReader();
                break;
            case "xml":
                $adapter = new XmlReader();
                break;
        endswitch;

        return new Reader($adapter);
    }
}