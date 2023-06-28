<?php

use App\Structural\FluentInterface\QueryBuilder;
use App\Structural\Flyweight\FlyweightFactory;
use App\Structural\Proxy\{CachingDownloader, Downloader, SimpleDownloader};
use App\Structural\Facade\{Computer, ComputerFacade};
use App\Structural\Decorator\{MilkCoffee, SimpleCoffee, VanillaCoffee, WhipCoffee};
use App\Structural\Adapter\{EmailNotification, Notification, SlackApi, SlackNotification};
use App\Structural\Bridge\{Page\About, Page\Careers, Theme\DarkTheme,};
use App\Structural\Composite\{Component, Composite, Leaf};
use App\Structural\DataMapper\{User, UserMapper};
use App\Structural\DependencyInjection\{GoogleMaps, OpenStreetMaps, StoreService};
use App\Structural\Registry\{Registry, Service};

function dependencyInjection(): void
{
    $googleMaps = new GoogleMaps();
    $googleService = new StoreService($googleMaps);

    $openStreetMaps = new OpenStreetMaps();
    $openStreetService = new StoreService($openStreetMaps);
}

function registry(): void
{
    $service = new Service();

    Registry::setService(1, $service);

    var_dump(Registry::getService(1));
}

function composite(): void
{
    function clientCode(Component $component): void
    {
        echo "RESULT: " . $component->operation();
    }

    $tree = new Composite();
    $branch1 = new Composite();
    $branch1->add(new Leaf());
    $branch1->add(new Leaf());
    $branch2 = new Composite();
    $branch2->add(new Leaf());
    $tree->add($branch1);
    $tree->add($branch2);
    clientCode($tree);
}

function adapter(): void
{
    function clientCode(Notification $notification): void
    {
        echo $notification->send("Website is down!",
                "Our website is not responding. Call admins and bring it up!") . PHP_EOL . PHP_EOL;
    }

    $notification = new EmailNotification("developers@example.com");
    clientCode($notification);

    $slackApi = new SlackApi("example.com", "XXXXXXXX");
    $notification = new SlackNotification($slackApi, "Example.com Developers");
    clientCode($notification);
}

function bridge(): void
{
    $darkTheme = new DarkTheme();

    $about = new About($darkTheme);
    $careers = new Careers($darkTheme);

    echo $about->getContent(); // "About page in Dark Black";
    echo $careers->getContent(); // "Careers page in Dark Black";
}

function dataMapper(): void
{
    $userMapper = new UserMapper('users.txt');

    $user = new User();
    $user->setName('John Doe');
    $user->setEmail('john.doe@example.com');
    $userMapper->save($user);

    $user = $userMapper->findById(1);
    if ($user) {
        echo $user->getName(); // "John Doe"
    }
}

function decorator(): void
{
    $someCoffee = new SimpleCoffee();
    echo $someCoffee->getCost(); // 10
    echo $someCoffee->getDescription(); // Simple Coffee

    $someCoffee = new MilkCoffee($someCoffee);
    echo $someCoffee->getCost(); // 12
    echo $someCoffee->getDescription(); // Simple Coffee, milk

    $someCoffee = new WhipCoffee($someCoffee);
    echo $someCoffee->getCost(); // 17
    echo $someCoffee->getDescription(); // Simple Coffee, milk, whip

    $someCoffee = new VanillaCoffee($someCoffee);
    echo $someCoffee->getCost(); // 20
    echo $someCoffee->getDescription(); // Simple Coffee, milk, whip, vanilla
}

function facade(): void
{
    $computer = new ComputerFacade(new Computer());
    $computer->turnOn(); // Ouch! Beep beep! Loading.. Ready to be used!
    $computer->turnOff(); // Bup bup buzzz! Haah! Zzzzz
}

function fluentInterface(): void
{
    $queryBuilder = new QueryBuilder();

    $query = $queryBuilder->select(['id', 'name'])->from('users')->where(['id < 3', 'name > 5'])->get();

    print $query;
}

function flyWeight(): void
{
    $factory = new FlyweightFactory([
        ["Chevrolet", "Camaro2018", "pink"],
        ["Mercedes Benz", "C300", "black"],
        ["Mercedes Benz", "C500", "red"],
        ["BMW", "M5", "red"],
        ["BMW", "X6", "white"],
    ]);
    $factory->listFlyweights();

    function addCarToPoliceDatabase(
        FlyweightFactory $ff, $plates, $owner,
                         $brand, $model, $color
    ): void
    {
        echo "\nClient: Adding a car to database.\n";
        $flyweight = $ff->getFlyweight([$brand, $model, $color]);

        $flyweight->operation([$plates, $owner]);
    }

    addCarToPoliceDatabase($factory,
        "CL234IR",
        "James Doe",
        "BMW",
        "M5",
        "red",
    );

    addCarToPoliceDatabase($factory,
        "CL234IR",
        "James Doe",
        "BMW",
        "X1",
        "red",
    );

    $factory->listFlyweights();
}

function proxy(): void
{
    function clientCode(Downloader $subject): void
    {
        $result = $subject->download("https://example.com/");

        $result = $subject->download("https://example.com/");
    }

    echo "Executing client code with real subject:" . PHP_EOL;
    $realSubject = new SimpleDownloader();
    clientCode($realSubject);

    echo PHP_EOL;

    echo "Executing the same client code with a proxy:" . PHP_EOL;
    $proxy = new CachingDownloader($realSubject);
    clientCode($proxy);
}
//registry();
//composite();
//adapter();
//bridge();
//dataMapper();
//decorator();
//facade();
//fluentInterface();
//flyWeight();
//proxy();