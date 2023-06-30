<?php

namespace App\Behavioral\Visitor;

// Место посещения
interface Animal
{
    public function accept(AnimalOperation $operation);
}
