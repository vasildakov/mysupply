<?php

declare(strict_types=1);

namespace VasilDakov\MySupply\Application\Service;

use Doctrine\Common\Collections\ArrayCollection;
use VasilDakov\MySupply\Domain\Auction;
use VasilDakov\MySupply\Domain\Item;
use VasilDakov\MySupply\Domain\Offer;

use VasilDakov\MySupply\Domain\OffersSpecification;

use function array_filter;
use function array_chunk;
use function in_array;
use function count;

/**
 * Class AuctionBuilder
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class AuctionFactory
{
    public array $auctions;

    public function __construct()
    {
        $this->auctions = [];
    }

    public function __invoke(array $data): array
    {
        $specification = new OffersSpecification();

        $array1 = array_filter($data['items'], function($key) use ($specification) {
            $offers = count($key['offers']);
            return $specification->isSatisfiedBy($offers);
        });
        $this->createAuction($array1);

        $array2 = array_filter($data['items'], function($key) use ($specification) {
            $offers = count($key['offers']);
            return !$specification->isSatisfiedBy($offers);
        });

        $chunks = array_chunk($array2, 1);
        foreach ($chunks as $chunk) {
            $this->createAuction($chunk);
        }
        return $this->auctions;
    }

    private function createAuction($array): void
    {
        $colspan = 4;
        $rows = [];
        $headers = ['Requested Item'];

        foreach ($array as $value) {
            $row = [];
            $row[] = $value['name'];

            // set the colspan for the table header
            $colspan = (null === $colspan) ?: count($value['offers']) + 1;

            foreach ($value['offers'] as $offer) {
                $row[] = $offer['price'];
                if (!in_array($offer['name'], $headers)) {
                    $headers[] = $offer['name'];
                }
            }
            $rows[] = $row;
        }
        $this->auctions[] = [
            'colspan' => $colspan,
            'headers' => $headers,
            'rows'    => $rows,
        ];
    }
}