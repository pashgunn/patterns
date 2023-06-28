<?php

namespace App\Structural\Bridge\Theme;

class DarkTheme implements Theme
{
    public function getColor(): string
    {
        return 'Dark Black';
    }
}