<?php

namespace App\Structural\Bridge\Page;

use App\Structural\Bridge\Theme\Theme;

class About implements WebPage
{

    public function __construct(protected Theme $theme)
    {
    }

    public function getContent(): string
    {
        return "About page in " . $this->theme->getColor();
    }
}