<?php

namespace App\Behavioral\Strategy;

class Sorter
{
    public function __construct(protected SortStrategy $sorter)
    {
    }

    public function sort(array $dataset): array
    {
        return $this->sorter->sort($dataset);
    }
}