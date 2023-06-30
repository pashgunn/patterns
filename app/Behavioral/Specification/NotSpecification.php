<?php

namespace App\Behavioral\Specification;

class NotSpecification implements Specification
{
    public function __construct(private readonly Specification $specification)
    {
    }

    public function isSatisfiedBy(Item $item): bool
    {
        return !$this->specification->isSatisfiedBy($item);
    }
}