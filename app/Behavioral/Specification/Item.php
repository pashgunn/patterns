<?php

namespace App\Behavioral\Specification;

class Item
{
    public function __construct(private readonly float $price)
    {
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}