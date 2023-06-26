<?php

namespace App\Creational\Pool;

class WorkerPool
{
    private array $freeWorkers = [];
    private array $busyWorkers = [];

    /**
     * @return array
     */
    public function getBusyWorkers(): array
    {
        return $this->busyWorkers;
    }

    /**
     * @param array $busyWorkers
     */
    public function setBusyWorkers(array $busyWorkers): void
    {
        $this->busyWorkers = $busyWorkers;
    }

    /**
     * @return array
     */
    public function getFreeWorkers(): array
    {
        return $this->freeWorkers;
    }

    /**
     * @param array $freeWorkers
     */
    public function setFreeWorkers(array $freeWorkers): void
    {
        $this->freeWorkers = $freeWorkers;
    }

    public function getWorker(): Worker
    {
        if (count($this->freeWorkers) === 0) {
            $worker = new Worker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }

        $this->busyWorkers[spl_object_hash($worker)] = $worker;

        return $worker;
    }

    public function release(Worker $worker): void
    {
        $key = spl_object_hash($worker);

        if (isset($this->busyWorkers[$key])) {
            unset($this->busyWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }
}