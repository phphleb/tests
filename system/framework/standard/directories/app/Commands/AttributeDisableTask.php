<?php

namespace App\Commands;

use Hleb\Constructor\Attributes\Disabled;

#[Disabled]
class AttributeDisableTask extends AttributeTask
{
    protected function run(): int
    {
        return parent::run();
    }
}