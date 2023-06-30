<?php

namespace App\Behavioral\Memento;

class State
{
    public const CREATED = 'created';
    public const PROCESS = 'process';
    public const TEST = 'test';
    public const DONE = 'done';


    /**
     * @param string $state
     */
    public function __construct(private readonly string $state)
    {
    }

    public function __toString(): string
    {
        return $this->state;
    }
}