<?php

namespace App\Behavioral\Strategy;

interface SortStrategy
{
    public function sort(array $dataset): array;
}