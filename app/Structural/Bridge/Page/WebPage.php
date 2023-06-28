<?php

namespace App\Structural\Bridge\Page;

use App\Structural\Bridge\Theme\Theme;

interface WebPage
{
    public function __construct(Theme $theme);
    public function getContent();
}