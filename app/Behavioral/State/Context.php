<?php

namespace App\Behavioral\State;

class Context
{
    public function __construct(private State $state)
    {
    }

    public function transitionTo(State $state): void
    {
        echo "Context: Transition to " . get_class($state) . PHP_EOL;
        $this->state = $state;
        $this->state->setContext($this);
    }

    public function request(): void
    {
        $this->state->status();
    }
}