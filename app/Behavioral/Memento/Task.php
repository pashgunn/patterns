<?php

namespace App\Behavioral\Memento;

class Task
{
    private State $state;

    public function create(): void
    {
        $this->state = new State(State::CREATED);
    }

    public function process(): void
    {
        $this->state = new State(State::PROCESS);
    }

    public function test(): void
    {
        $this->state = new State(State::TEST);
    }

    public function done(): void
    {
        $this->state = new State(State::DONE);
    }

    public function saveToMemento(): Memento
    {
        return new Memento($this->state);
    }

    public function restoreFromMemento(Memento $memento): void
    {
        $this->state = $memento->getState();
    }

    public function getState(): State
    {
        return $this->state;
    }
}