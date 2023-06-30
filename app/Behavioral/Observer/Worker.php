<?php

namespace App\Behavioral\Observer;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class Worker implements SplSubject
{
    private SplObjectStorage $observers;
    private string $name = '';

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function changeName(string $name)
    {
        $this->name = $name;
        $this->notify();
    }
}