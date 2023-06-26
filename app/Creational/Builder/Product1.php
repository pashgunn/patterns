<?php

namespace App\Creational\Builder;

class Product1
{
    public array $parts = [];

    public function listParts(): void
    {
        echo "Product parts: " . implode(', ', $this->parts) . PHP_EOL . PHP_EOL;
    }
}
