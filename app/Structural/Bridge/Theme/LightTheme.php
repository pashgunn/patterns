<?php

namespace App\Structural\Bridge\Theme;

class LightTheme implements Theme
{
    public function getColor(): string
    {
        return 'Off white';
    }
}