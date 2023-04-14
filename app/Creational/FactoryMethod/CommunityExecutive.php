<?php

namespace App\Creational\FactoryMethod;

class CommunityExecutive implements Interviewer
{

    public function askQuestions()
    {
        echo 'Asking about community building' . PHP_EOL;
    }
}