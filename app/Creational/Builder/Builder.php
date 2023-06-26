<?php

namespace App\Creational\Builder;


interface Builder
{
    public function producePartA(): void;

    public function producePartB(): void;

    public function producePartC(): void;
}