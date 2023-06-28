<?php

namespace App\Structural\Flyweight;

/**
 * хранит общую часть состояния и
 * принимает оставшуюся часть состояния через параметры метода.
 */
class Flyweight
{
    public function __construct(private $sharedState)
    {
    }

    public function operation($uniqueState): void
    {
        $shared = json_encode($this->sharedState);
        $unique = json_encode($uniqueState);
        echo "Flyweight: Displaying shared ($shared) and unique ($unique) state." . PHP_EOL;
    }
}