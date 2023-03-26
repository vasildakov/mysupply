<?php

declare(strict_types=1);


namespace VasilDakov\MySupply\Domain;

/**
 * Class OffersSpecification
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class OffersSpecification implements Specification
{
    private const OFFER_COUNT = 3;

    public function isSatisfiedBy(int $offers): bool
    {
        return $this::OFFER_COUNT === $offers;
    }
}
