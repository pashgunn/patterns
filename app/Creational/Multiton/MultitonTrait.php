<?php

namespace App\Creational\Multiton;

trait MultitonTrait
{
    private static array $instances = [];

    private string $name;

    private function __construct()
    {
        //
    }

    private function __clone()
    {
        //
    }

    public function __wakeup()
    {
        //
    }

    public static function getInstance(string $instanceName): MultitionInterface
    {
        if (isset(static::$instances[$instanceName])) {
            return static::$instances[$instanceName];
        }

        static::$instances[$instanceName] = new static();
        static::$instances[$instanceName]->setName($instanceName);

        return static::$instances[$instanceName];
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }
}