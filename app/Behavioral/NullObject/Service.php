<?php

namespace App\Behavioral\NullObject;

class Service
{
    public function __construct(private readonly Logger $logger)
    {
    }

    /**
     * do something ...
     */
    public function doSomething(): void
    {
        // notice here that you don't have to check if the logger is set with eg. is_null(), instead just use it
        $this->logger->log('We are in ' . __METHOD__);
    }
}