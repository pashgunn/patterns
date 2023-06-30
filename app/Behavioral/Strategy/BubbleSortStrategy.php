<?php

namespace App\Behavioral\Strategy;

class BubbleSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo "Sorting using bubble sort" . PHP_EOL;

        // Do sorting
        return $dataset;
    }
}