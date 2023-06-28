<?php

namespace App\Structural\DependencyInjection;

class OpenStreetMaps implements GeolocationService
{

    public function getCoordinatesFromAddress(string $address): string
    {
        return 'OpenStreetMaps address:' . $address . PHP_EOL;
    }
}