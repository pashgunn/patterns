<?php

namespace App\Behavioral\TemplateMethod;


class Twitter extends SocialNetwork
{
    protected function logIn(string $userName, string $password): bool
    {
        echo PHP_EOL . "Checking user's credentials..." . PHP_EOL;

        echo "Name: {$this->username}" . PHP_EOL;

        echo "Password: " . str_repeat("*", strlen($this->password)) . PHP_EOL;

        echo PHP_EOL . PHP_EOL . "Twitter: '{$this->username}' has logged in successfully." . PHP_EOL;

        return true;
    }

    protected function sendData(string $message): bool
    {
        echo "Twitter: '{$this->username}' has posted '{$message}'" . PHP_EOL;

        return true;
    }

    protected function logOut(): void
    {
        echo "Twitter: '{$this->username}' has been logged out." . PHP_EOL;    }
}