<?php

namespace App\Structural\Facade;

class Computer
{
    public function getElectricShock(): void
    {
        echo "Ouch!";
    }

    public function makeSound(): void
    {
        echo "Beep beep!";
    }

    public function showLoadingScreen(): void
    {
        echo "Loading..";
    }

    public function bam(): void
    {
        echo "Ready to be used!";
    }

    public function closeEverything(): void
    {
        echo "Bup bup bup buzzzz!";
    }

    public function sooth(): void
    {
        echo "Zzzzz";
    }

    public function pullCurrent(): void
    {
        echo "Haaah!";
    }
}