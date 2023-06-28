<?php

namespace App\Structural\Bridge\Page;

use App\Structural\Bridge\Theme\Theme;

class Careers implements WebPage
{
    public function __construct(protected Theme $theme)
    {
    }

    public function getContent(): string
    {
        return "Careers page in " . $this->theme->getColor();
    }
}