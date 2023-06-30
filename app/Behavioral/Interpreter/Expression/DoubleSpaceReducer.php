<?php

namespace App\Behavioral\Interpreter\Expression;

use App\Behavioral\Interpreter\Context;

class DoubleSpaceReducer extends Expression
{
    public function interpret(Context $context): string
    {
        return preg_replace('/\s{2,}/', ' ', $context->getText());
    }
}