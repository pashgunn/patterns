<?php

namespace App\Structural\Decorator;

class WhipCoffee implements Coffee
{
    public function __construct(protected Coffee $coffee)
    {
    }

    public function getCost(): int
    {
        return $this->coffee->getCost() + 5;
    }

    public function getDescription(): string
    {
        return $this->coffee->getDescription() . ', whip';
    }
}
