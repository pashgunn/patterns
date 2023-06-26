<?php

namespace App\Creational\SimpleFactory;

class DoorFactory
{
    /**
     * Static factory
     */
    public static function makeStaticDoor(float $width, float $height): Door
    {
        return new WoodenDoor($width, $height);
    }

    /**
     * Simple factory
     */
    public function makeDoor(float $width, float $height): Door
    {
        return new WoodenDoor($width, $height);
    }
}