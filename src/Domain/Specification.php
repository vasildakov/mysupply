<?php
declare(strict_types=1);

namespace VasilDakov\MySupply\Domain;


/**
 * Interface Specification
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface Specification
{
    public function isSatisfiedBy(int $offers): bool;
}