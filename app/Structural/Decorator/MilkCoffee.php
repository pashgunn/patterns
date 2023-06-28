<?php

namespace App\Structural\Decorator;

class MilkCoffee implements Coffee
{
    public function __construct(protected Coffee $coffee)
    {
    }

    public function getCost(): int
    {
        return $this->coffee->getCost() + 2;
    }

    public function getDescription(): string
    {
        return $this->coffee->getDescription() . ', milk';
    }
}
