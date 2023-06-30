<?php

namespace App\Behavioral\Mediator;

class User
{

    public function __construct(
        protected string           $name,
        protected ChatRoomMediator $chatMediator
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function send($message): void
    {
        $this->chatMediator->showMessage($this, $message);
    }
}