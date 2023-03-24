<?php

declare(strict_types=1);

namespace VasilDakov\MySupply\Application\Service;
use VasilDakov\MySupply\Infrastructure\Laminas\Reader\ReaderInterface;

use function file_exists;
use function is_readable;
use function sprintf;

/**
 * Class Reader
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Reader
{
    readonly ReaderInterface $adapter;

    public function __construct(ReaderInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAdapter(): ReaderInterface
    {
        return $this->adapter;
    }

    public function __invoke(string $file, string $ext): array
    {
        $filename = sprintf('./data/%s.%s', $file, $ext);

        if (!file_exists($filename) || !is_readable($filename)) {
            throw new \RuntimeException('The file does not exist or is not readable!');
        }

        return $this->adapter->fromFile($filename);
    }
}
