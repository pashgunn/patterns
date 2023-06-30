<?php

namespace App\Behavioral\Iterator;

use Iterator;
use ReturnTypeWillChange;

class AlphabeticalOrderIterator implements Iterator
{
    private int $position = 0;

    /**
     * @param WordsCollection $collection
     * @param mixed $reverse Указывает направление обхода.
     */
    public function __construct(
        private readonly WordsCollection $collection,
        private readonly mixed           $reverse = false
    )
    {
    }

    #[ReturnTypeWillChange] public function rewind()
    {
        $this->position = $this->reverse ?
            count($this->collection->getItems()) - 1 : 0;
    }

    #[ReturnTypeWillChange] public function current()
    {
        return $this->collection->getItems()[$this->position];
    }

    #[ReturnTypeWillChange] public function key(): int
    {
        return $this->position;
    }

    #[ReturnTypeWillChange] public function next(): void
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    #[ReturnTypeWillChange] public function valid(): bool
    {
        return isset($this->collection->getItems()[$this->position]);
    }
}