<?php

namespace App\Behavioral\Interpreter\Expression;

use App\Behavioral\Interpreter\Context;

class TabReplacer extends Expression
{
    public function interpret(Context $context): string
    {
        return str_replace("\t", '', $context->getText());
    }
}