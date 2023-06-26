<?php

namespace App\Creational\Multiton;

class Multiton implements MultitionInterface
{
    use MultitonTrait;

    private string $test;

    public function setTest(string $value)
    {
        $this->test = $value;

        return $this;
    }
}