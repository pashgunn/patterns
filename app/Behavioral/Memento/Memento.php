<?php

namespace App\Behavioral\Memento;

class Memento
{
    /**
     * @param State $state
     */
    public function __construct(private State $state)
    {
    }

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }
}