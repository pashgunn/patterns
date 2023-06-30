<?php

namespace App\Behavioral\Interpreter\Expression;

use App\Behavioral\Interpreter\Context;

class NewlineReducer extends Expression
{
    public function interpret(Context $context): string
    {
        return preg_replace('/\n{2,}/', "\n", $context->getText());
    }
}