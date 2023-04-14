<?php

namespace App\Creational\FactoryMethod;

class Developer implements Interviewer
{

    public function askQuestions()
    {
        echo 'Asking about design patterns' . PHP_EOL;
    }
}