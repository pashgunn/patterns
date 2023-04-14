<?php

namespace App\Creational\FactoryMethod;

class MarketingManager extends HiringManager
{

    public function makeInterviewer(): Interviewer
    {
        return new CommunityExecutive();
    }
}