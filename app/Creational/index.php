<?php

namespace App\Creational;

use App\Creational\AbstractFactory\IronDoorFactory;
use App\Creational\AbstractFactory\WoodenDoorFactory;
use App\Creational\FactoryMethod\DevelopmentManager;
use App\Creational\FactoryMethod\MarketingManager;

function simpleFactory(): void
{

}

function abstractFactory(): void
{
    $woodenFactory = new WoodenDoorFactory();
    $door = $woodenFactory->makeDoor();
    $expert = $woodenFactory->makeFittingExpert();

    $door->getDescription();
    $expert->getDescription();

    $ironFactory = new IronDoorFactory();
    $door = $ironFactory->makeDoor();
    $expert = $ironFactory->makeFittingExpert();

    $door->getDescription();
    $expert->getDescription();
}

function factoryMethod(): void
{
    $devManager = new DevelopmentManager();
    $devManager->takeInterview();

    $marketingManager = new MarketingManager();
    $marketingManager->takeInterview();
}

//abstractFactory();
//factoryMethod();