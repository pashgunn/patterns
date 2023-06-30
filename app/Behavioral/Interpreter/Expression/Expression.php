<?php

namespace App\Behavioral\Interpreter\Expression;

use App\Behavioral\Interpreter\Context;

abstract class Expression
{
    public Context $content;
    public function interpret(Context $context): string
    {
        return $context->getText();
    }
}