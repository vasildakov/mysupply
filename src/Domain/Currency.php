<?php

declare(strict_types=1);


namespace VasilDakov\MySupply\Domain;

/**
 * Class Currency
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Currency
{
    private string $code;

    public function __construct(string $code)
    {
        $this->code = strtoupper($code);
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function equals(Currency $other): bool
    {
        return $this->code === $other->code;
    }

    public function __toString(): string
    {
        return $this->code;
    }
}
