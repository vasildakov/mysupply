<?php 

declare(strict_types=1);

namespace VasilDakov\MySupply\Domain;

/**
 * Class Auction
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Auction {

    // the name of the auction
    readonly string $name;

    // the array of items/lots
    private array $items = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addItem(Item $item): void
    {
        $this->items[$item->name] = $item;
    }

    public function removeItem(Item $item): void
    {
        unset($this->items[$item->name]);
    }

    public function getItems(): array
    {
        return $this->items;
    }
}