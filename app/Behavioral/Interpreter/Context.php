<?php

namespace App\Behavioral\Interpreter;

class Context
{
    private string $text;

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }
}