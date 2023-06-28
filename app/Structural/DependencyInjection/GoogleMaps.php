<?php

namespace App\Structural\DependencyInjection;

class GoogleMaps implements GeolocationService
{

    public function getCoordinatesFromAddress(string $address): string
    {
        return 'GoogleMaps address:' . $address . PHP_EOL;
    }
}