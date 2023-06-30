<?php

namespace App\Behavioral\Command;

class TurnOff implements Command
{
    public function __construct(protected Bulb $bulb)
    {
    }

    public function execute()
    {
        $this->bulb->turnOff();
    }

    public function undo()
    {
        $this->bulb->turnOn();
    }

    public function redo()
    {
        $this->execute();
    }
}