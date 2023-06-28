<?php

namespace App\Structural\DependencyInjection;

class StoreService
{

    public function __construct(private readonly GeolocationService $geolocationService)
    {
    }

    public function getStoreCoordinates($store): string
    {
        return $this->geolocationService->getCoordinatesFromAddress($store->getAddress());
    }
}