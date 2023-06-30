<?php

namespace App\Behavioral;

use App\Behavioral\Specification\{AndSpecification, Item, NotSpecification, OrSpecification, PriceSpecification};
use App\Behavioral\Iterator\WordsCollection;
use App\Behavioral\Visitor\{Dolphin, Jump, Lion, Monkey, Speak};
use App\Behavioral\TemplateMethod\{Facebook, Twitter};
use App\Behavioral\Observer\{Worker, WorkerObserver};
use App\Behavioral\Memento\{Task};
use App\Behavioral\Mediator\{ChatRoom, User};
use App\Behavioral\ChainOfResponsibility\{RoleCheckMiddleware, Server, ThrottlingMiddleware, UserExistsMiddleware};
use App\Behavioral\Command\{Bulb, RemoteControl, TurnOff, TurnOn};
use App\Behavioral\NullObject\{NullLogger, PrintLogger, Service};
use App\Behavioral\Strategy\{BubbleSortStrategy, QuickSortStrategy, Sorter};
use App\Behavioral\State\{Context, Created, Process};
use App\Behavioral\Interpreter\Expression\{
    BracketSpaceRemover,
    DashReducer,
    DoubleSpaceReducer,
    NewlineReducer,
    QuoteReplacer,
    TabReplacer
};
use App\Behavioral\Interpreter\Context as InterpreterContext;

function state(): void
{
    $context = new Context(new Created());
    $context->request();

    $context->transitionTo(new Process());
    $context->request();
}

function strategy(): void
{
    $dataset = [1, 5, 4, 3, 2, 8];

    $sorter = new Sorter(new BubbleSortStrategy());
    $sorter->sort($dataset); // Output : Пузырьковая сортировка

    $sorter = new Sorter(new QuickSortStrategy());
    $sorter->sort($dataset); // Output : Быстрая сортировка
}

function objectNull(): void
{
    $service = new Service(new NullLogger());
    $service->doSomething();

    $service = new Service(new PrintLogger());
    $service->doSomething();
}

function command(): void
{
    $bulb = new Bulb();

    $turnOn = new TurnOn($bulb);
    $turnOff = new TurnOff($bulb);

    $remote = new RemoteControl();
    $remote->submit($turnOn);
    $remote->submit($turnOff);
}

function interpreter(): void
{
    $text = 'Это - пример текста, с множественными пробелами   и дефисами.
"Кавычки" должны быть заменены на «кавычки», а табуляторы на пробелы.
( Лишние пробелы перед и после скобок, запятых и точек).
Множественные переводы строк

должны быть уменьшены.';

    $context = new InterpreterContext();
    $context->setText($text);
    echo $context->getText() . PHP_EOL . PHP_EOL;

    $expressions = [];
    $expressions[] = new QuoteReplacer();
    $expressions[] = new DashReducer();
    $expressions[] = new TabReplacer();
    $expressions[] = new NewlineReducer();
    $expressions[] = new DoubleSpaceReducer();
    $expressions[] = new BracketSpaceRemover();


    foreach ($expressions as $expression) {
        $context->setText($expression->interpret($context));
    }
    echo $context->getText();
}

function specification(): void
{
    $spec1 = new PriceSpecification(50, 99);
    $spec2 = new PriceSpecification(101, 200);

    $orSpecification = new OrSpecification($spec1, $spec2);
    $andSpecification = new AndSpecification($spec1, $spec2);
    $notSpecification = new NotSpecification($spec1);
    $item = new Item(100);

    var_dump($orSpecification->isSatisfiedBy($item));
    var_dump($andSpecification->isSatisfiedBy($item));
    var_dump($notSpecification->isSatisfiedBy($item));
}

function chain(): void
{
    $server = new Server();
    $server->register("admin@example.com", "admin_pass");
    $server->register("user@example.com", "user_pass");

// Все middleware соединены в цепочки. Клиент может построить различные
// конфигурации цепочек в зависимости от своих потребностей.
    $middleware = new ThrottlingMiddleware(2);
    $middleware
        ->linkWith(new UserExistsMiddleware($server))
        ->linkWith(new RoleCheckMiddleware());

    $server->setMiddleware($middleware);

    do {
        echo "\nEnter your email:" . PHP_EOL;
        $email = readline();
        echo "Enter your password:" . PHP_EOL;
        $password = readline();
        $success = $server->logIn($email, $password);
    } while (!$success);
}

function iterator(): void
{
    $collection = new WordsCollection();
    $collection->addItem("First");
    $collection->addItem("Second");
    $collection->addItem("Third");

    echo "Straight traversal:\n";
    foreach ($collection->getIterator() as $item) {
        echo $item . PHP_EOL;
    }

    echo "\n";
    echo "Reverse traversal:\n";
    foreach ($collection->getReverseIterator() as $item) {
        echo $item . PHP_EOL;
    }
}

function mediator(): void
{
    $mediator = new ChatRoom();

    $john = new User('John Doe', $mediator);
    $jane = new User('Jane Doe', $mediator);

    $john->send('Hi there!');
    $jane->send('Hey!');
}

function memento(): void
{
    $task = new Task();

    $task->create();
    $task->process();
    $task->test();
    $task->done();

    $memento = $task->saveToMemento();

    var_dump($task->getState() === $memento->getState());
}

function observer(): void
{
    $observer = new WorkerObserver();

    $worker = new Worker();

    $worker->attach($observer);

    $worker->changeName('Test');

    var_dump($observer->getWorkers());
}

function templateMethod(): void
{
    echo "Username: " . PHP_EOL;
    $username = readline();
    echo "Password: " . PHP_EOL;
    $password = readline();
    echo "Message: " . PHP_EOL;
    $message = readline();

    echo PHP_EOL . "Choose the social network to post the message:" . PHP_EOL .
        "1 - Facebook" . PHP_EOL .
        "2 - Twitter" . PHP_EOL;
    $choice = readline();


    if ($choice == 1) {
        $network = new Facebook($username, $password);
    } elseif ($choice == 2) {
        $network = new Twitter($username, $password);
    } else {
        die("Sorry, I'm not sure what you mean by that." . PHP_EOL);
    }
    $network->post($message);
}

function visitor(): void
{
    $monkey = new Monkey();
    $lion = new Lion();
    $dolphin = new Dolphin();

    $speak = new Speak();

    $jump = new Jump();

    $monkey->accept($speak);
    $monkey->accept($jump);

    $lion->accept($speak);
    $lion->accept($jump);

    $dolphin->accept($speak);
    $dolphin->accept($jump);
}

//state();
//strategy();
//objectNull();
//command();
//interpreter();
//specification();
//chain();
//iterator();
//mediator();
//memento();
//observer();
//templateMethod();
//visitor();