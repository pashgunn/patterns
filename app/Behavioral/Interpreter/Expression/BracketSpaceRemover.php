<?php

namespace App\Behavioral\Interpreter\Expression;

use App\Behavioral\Interpreter\Context;

class BracketSpaceRemover extends Expression
{
    public function interpret(Context $context): string
    {
        return preg_replace('/(\() | (\) )| ( ,)| ( \.)/', '$1$2$3$4', $context->getText());
    }
}