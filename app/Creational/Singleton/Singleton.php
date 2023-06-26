<?php

namespace App\Creational\Singleton;

final class Singleton
{
    private string $name;

    private static ?self $instance = null;

    /*
     * запрещаем прямое создание
     */
    private function __construct()
    {
        //
    }

    /*
     * запрещаем клонирование
     */
    private function __clone(): void
    {
        //
    }

    /*
     * запрещаем десереализацию
     */
    public function __wakeup(): void
    {
        //
    }

    public static function getInstance(): self
    {
        return self::$instance ?? (self::$instance = new self());
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}