<?php

namespace App\Behavioral\Interpreter\Expression;

use App\Behavioral\Interpreter\Context;

class QuoteReplacer extends Expression
{
    public function interpret(Context $context): string
    {
        return preg_replace('/"([^"]*)"/', "«$1»", $context->getText());
    }
}