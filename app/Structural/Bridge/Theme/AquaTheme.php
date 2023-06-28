<?php

namespace App\Structural\Bridge\Theme;

class AquaTheme implements Theme
{
    public function getColor(): string
    {
        return 'Light blue';
    }
}