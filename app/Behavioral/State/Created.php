<?php

namespace App\Behavioral\State;

class Created extends State
{
    public function status(): void
    {
        echo 'Created' . PHP_EOL;
    }
}