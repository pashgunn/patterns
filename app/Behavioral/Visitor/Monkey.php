<?php

namespace App\Behavioral\Visitor;

class Monkey implements Animal
{
    public function shout()
    {
        echo 'Ooh oo aa aa!' . PHP_EOL;
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitMonkey($this);
    }
}
