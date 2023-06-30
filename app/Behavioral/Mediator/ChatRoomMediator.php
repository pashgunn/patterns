<?php

namespace App\Behavioral\Mediator;

interface ChatRoomMediator
{
    public function showMessage(User $user, string $message);
}

// Посредник
