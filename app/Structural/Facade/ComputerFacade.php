<?php

namespace App\Structural\Facade;

class ComputerFacade
{

    public function __construct(protected Computer $computer)
    {
    }

    public function turnOn(): void
    {
        $this->computer->getElectricShock();
        $this->computer->makeSound();
        $this->computer->showLoadingScreen();
        $this->computer->bam();
    }

    public function turnOff(): void
    {
        $this->computer->closeEverything();
        $this->computer->pullCurrent();
        $this->computer->sooth();
    }
}