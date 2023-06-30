<?php

namespace App\Behavioral\TemplateMethod;


abstract class SocialNetwork
{
    public function __construct(
        protected string $username,
        protected string $password
    )
    {
    }


    public function post(string $message): bool
    {
        if ($this->logIn($this->username, $this->password)) {
            $result = $this->sendData($message);
            // ...
            $this->logOut();

            return $result;
        }

        return false;
    }

    abstract protected function logIn(string $userName, string $password): bool;

    abstract protected function sendData(string $message): bool;

    abstract protected function logOut(): void;
}
