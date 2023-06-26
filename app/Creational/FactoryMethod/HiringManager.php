<?php

namespace App\Creational\FactoryMethod;

abstract class HiringManager
{
    // Фабричный метод
    abstract public function makeInterviewer(): Interviewer;

    public function takeInterview(): void
    {
        $interviewer = $this->makeInterviewer();
        $interviewer->askQuestions();
    }
}