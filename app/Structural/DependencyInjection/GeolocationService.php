<?php

namespace App\Structural\DependencyInjection;

interface GeolocationService
{
    public function getCoordinatesFromAddress(string $address): string;
}