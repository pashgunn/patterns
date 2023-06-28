<?php

namespace App\Creational;

use App\Creational\AbstractFactory\{IronDoorFactory, WoodenDoorFactory};
use App\Creational\Builder\{ConcreteBuilder1, Director};
use App\Creational\FactoryMethod\{DevelopmentManager, MarketingManager};
use App\Creational\Multiton\Multiton;
use App\Creational\Pool\WorkerPool;
use App\Creational\Prototype\{Author, Page};
use App\Creational\SimpleFactory\DoorFactory;
use App\Creational\Singleton\Singleton;

function simpleAndStaticFactory(): void
{
    //static factory
    $door = DoorFactory::makeStaticDoor(100, 200);

    //simple factory
    $doorFactory = new DoorFactory();
    $doorFactory->makeDoor(100, 200);
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

function singleton(): void
{
    $singleton1 = Singleton::getInstance();

    $singleton2 = Singleton::getInstance();

    var_dump($singleton1 === $singleton2);
}

function multiton(): void
{
    $multiton[] = Multiton::getInstance('mysql')->setTest('mysql-test');
    $multiton[] = Multiton::getInstance('mongo');

    $multiton[] = Multiton::getInstance('mysql');
    $multiton[] = Multiton::getInstance('mongo')->setTest('mongo-test');

    var_dump($multiton[0] === $multiton[2]);
    var_dump($multiton[1] === $multiton[3]);
}

function builder(Director $director): void
{
    $builder = new ConcreteBuilder1();
    $director->setBuilder($builder);

    echo "Standard basic product:" . PHP_EOL;
    $director->buildMinimalViableProduct();
    $builder->getProduct()->listParts();

    echo "Standard full featured product:"  . PHP_EOL;
    $director->buildFullFeaturedProduct();
    $builder->getProduct()->listParts();

    // Использование без директора
    echo "Custom product:"  . PHP_EOL;
    $builder->producePartA();
    $builder->producePartC();
    $builder->getProduct()->listParts();
}

function prototype(): void
{
    $author = new Author("John Smith");
    $page = new Page("Tip of the day", "Keep calm and carry on.", $author);

    $page->addComment("Nice tip, thanks!");

    $draft = clone $page;
    echo "Dump of the clone. Note that the author is now referencing two objects." . PHP_EOL . PHP_EOL;
    var_dump($draft);
}

function worker(): void
{
    $pool = new WorkerPool();

    $worker1 = $pool->getWorker();
    $worker2 = $pool->getWorker();
    $worker3 = $pool->getWorker();

    $pool->release($worker2);

    var_dump($pool->getFreeWorkers()); //worker2
    var_dump($pool->getBusyWorkers()); //worker1, worker3
}

//abstractFactory();
//factoryMethod();
//simpleAndStaticFactory();
//singleton();
//multiton();
//builder(new Director());
//prototype();
//worker();