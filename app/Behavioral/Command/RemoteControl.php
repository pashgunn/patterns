<?php

namespace App\Behavioral\Command;

// Invoker
class RemoteControl
{
    public function submit(Command $command): void
    {
        $command->execute();
    }
}