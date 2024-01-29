<?php

namespace App\Commands;

use Hleb\Constructor\Attributes\Task\Purpose;

#[Purpose(Purpose::FULL)]
class AttributePurposeFullTask extends AttributeTask
{
    protected function run(): int
    {
        return parent::run();
    }
}