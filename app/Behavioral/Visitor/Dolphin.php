<?php

namespace App\Behavioral\Visitor;

class Dolphin implements Animal
{
    public function speak()
    {
        echo 'Tuut tuttu tuutt!' . PHP_EOL;
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitDolphin($this);
    }
}