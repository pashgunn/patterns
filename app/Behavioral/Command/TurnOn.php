<?php

namespace App\Behavioral\Command;

class TurnOn implements Command
{
    public function __construct(protected Bulb $bulb)
    {
    }

    public function execute()
    {
        $this->bulb->turnOn();
    }

    public function undo()
    {
        $this->bulb->turnOff();
    }

    public function redo()
    {
        $this->execute();
    }
}