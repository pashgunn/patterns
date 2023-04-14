<?php

namespace App\Creational\AbstractFactory;

class IronDoor implements Door
{

    public function getDescription()
    {
        echo 'I am an iron door' . PHP_EOL;
    }
}