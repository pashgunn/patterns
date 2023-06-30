<?php

namespace App\Behavioral\State;

class Done extends State
{
    public function status(): void
    {
        echo 'Done' . PHP_EOL;
    }
}