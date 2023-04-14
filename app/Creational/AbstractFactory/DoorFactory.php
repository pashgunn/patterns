<?php

namespace App\Creational\AbstractFactory;

interface DoorFactory
{
    public function makeDoor(): Door;
    public function makeFittingExpert(): DoorFittingExpert;
}