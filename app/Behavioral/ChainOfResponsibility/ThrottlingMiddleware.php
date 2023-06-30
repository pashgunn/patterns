<?php

namespace App\Behavioral\ChainOfResponsibility;

/**
 * Это Конкретное Middleware проверяет, не было ли превышено максимальное число
 * неудачных запросов авторизации.
 */
class ThrottlingMiddleware extends Middleware
{
    private int $request = 0;

    private int $currentTime;

    public function __construct(
        private readonly int $requestPerMinute
    )
    {
        $this->currentTime = time();
    }

    public function check(string $email, string $password): bool
    {
        if (time() > $this->currentTime + 60) {
            $this->request = 0;
            $this->currentTime = time();
        }

        $this->request++;

        if ($this->request > $this->requestPerMinute) {
            echo "ThrottlingMiddleware: Request limit exceeded!" . PHP_EOL;
            die();
        }

        return parent::check($email, $password);
    }
}