<?php

namespace App\Creational\FactoryMethod;

abstract class HiringManager
{
    abstract public function makeInterviewer(): Interviewer;

    public function takeInterview(): void
    {
        $interviewer = $this->makeInterviewer();
        $interviewer->askQuestions();
    }
}