<?php

namespace App\Behavioral\ChainOfResponsibility;

/**
 * Это Конкретное Middleware проверяет, имеет ли пользователь, связанный с
 * запросом, достаточные права доступа.
 */
class RoleCheckMiddleware extends Middleware
{
    public function check(string $email, string $password): bool
    {
        if ($email === "admin@example.com") {
            echo "RoleCheckMiddleware: Hello, admin!" . PHP_EOL;

            return true;
        }
        echo "RoleCheckMiddleware: Hello, user!" . PHP_EOL;

        return parent::check($email, $password);
    }
}
