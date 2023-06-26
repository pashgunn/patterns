<?php

namespace App\Creational\SimpleFactory;

class WoodenDoor implements Door
{
    public function __construct(
        protected float $width,
        protected float $height
    ) {
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }
}