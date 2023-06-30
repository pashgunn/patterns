<?php

namespace App\Behavioral\Strategy;

class QuickSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo "Sorting using quick sort" . PHP_EOL;

        // Do sorting
        return $dataset;
    }
}