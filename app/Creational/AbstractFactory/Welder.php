<?php

namespace App\Creational\AbstractFactory;

class Welder implements DoorFittingExpert
{
    public function getDescription()
    {
        echo 'I can only fit iron doors' . PHP_EOL;
    }
}