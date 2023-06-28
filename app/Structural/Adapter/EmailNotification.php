<?php

namespace App\Structural\Adapter;

class EmailNotification implements Notification
{
    public function __construct(private readonly string $adminEmail)
    {
    }

    public function sendEmail(string $email, string $title, string $message)
    {
        //logic
    }

    public function send(string $title, string $message): void
    {
        $this->sendEmail($this->adminEmail, $title, $message);
        echo "Sent email with title '$title' to '{$this->adminEmail}' that says '$message'.";
    }
}