<?php

namespace App\Behavioral\Interpreter\Expression;

use App\Behavioral\Interpreter\Context;

class DashReducer extends Expression
{
    public function interpret(Context $context): string
    {
        return str_replace('-', '—', $context->getText());
    }
}