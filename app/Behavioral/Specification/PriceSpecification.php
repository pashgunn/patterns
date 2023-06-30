<?php

namespace App\Behavioral\Specification;

class PriceSpecification implements Specification
{
    public function __construct(
        private readonly ?float $minPrice,
        private readonly ?float $maxPrice
    )
    {
    }

    public function isSatisfiedBy(Item $item): bool
    {
        if ($this->maxPrice !== null && $item->getPrice() > $this->maxPrice) {
            return false;
        }

        if ($this->minPrice !== null && $item->getPrice() < $this->minPrice) {
            return false;
        }

        return true;
    }
}