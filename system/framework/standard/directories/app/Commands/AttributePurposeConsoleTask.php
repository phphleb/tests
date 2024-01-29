<?php

namespace App\Commands;

use Hleb\Constructor\Attributes\Task\Purpose;

#[Purpose(Purpose::CONSOLE)]
class AttributePurposeConsoleTask extends AttributeTask
{
    protected function run(): int
    {
        return parent::run();
    }
}