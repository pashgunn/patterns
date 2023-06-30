<?php

namespace App\Behavioral\Specification;

interface Specification
{
    public function isSatisfiedBy(Item $item): bool;
}