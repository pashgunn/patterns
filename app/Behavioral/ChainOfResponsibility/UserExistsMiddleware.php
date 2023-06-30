<?php

namespace App\Behavioral\ChainOfResponsibility;

/**
 * Это Конкретное Middleware проверяет, существует ли пользователь с указанными
 * учётными данными.
 */
class UserExistsMiddleware extends Middleware
{
    public function __construct(private readonly Server $server)
    {
    }

    public function check(string $email, string $password): bool
    {
        if (!$this->server->hasEmail($email)) {
            echo "UserExistsMiddleware: This email is not registered!" . PHP_EOL;

            return false;
        }

        if (!$this->server->isValidPassword($email, $password)) {
            echo "UserExistsMiddleware: Wrong password!" . PHP_EOL;

            return false;
        }

        return parent::check($email, $password);
    }
}