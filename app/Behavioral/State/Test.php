<?php

namespace App\Behavioral\State;

class Test extends State
{
    public function status(): void
    {
        echo 'Test' . PHP_EOL;
    }
}