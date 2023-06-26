<?php

namespace App\Creational\Multiton;

interface MultitionInterface
{
    public static function getInstance(string $instanceName): self;
}