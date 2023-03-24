<?php

namespace VasilDakov\MySupply\Infrastructure\Laminas\Reader;

/**
 * Interface ReaderInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface ReaderInterface
{
    public function fromFile(string $filename);

    public function fromString(string $string);
}
