<?php

namespace App\Structural\Decorator;

class VanillaCoffee implements Coffee
{
    public
    function __construct(protected Coffee $coffee)
    {
    }

    public
    function getCost(): int
    {
        return $this->coffee->getCost() + 3;
    }

    public
    function getDescription(): string
    {
        return $this->coffee->getDescription() . ', vanilla';
    }
}
