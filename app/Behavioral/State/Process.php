<?php

namespace App\Behavioral\State;

class Process extends State
{
    public function status(): void
    {
        echo 'Process' . PHP_EOL;
    }
}