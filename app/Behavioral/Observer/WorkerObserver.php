<?php

namespace App\Behavioral\Observer;

use SplObserver;
use SplSubject;

class WorkerObserver implements SplObserver
{
    private array $workers = [];

    /**
     * @return array
     */
    public function getWorkers(): array
    {
        return $this->workers;
    }

    public function update(SplSubject $subject): void
    {
        $this->workers[] = clone $subject;
    }
}