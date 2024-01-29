<?php

namespace App\Commands;

use Hleb\Constructor\Attributes\Task\Purpose;

#[Purpose(Purpose::EXTERNAL)]
class AttributePurposeExternalTask extends AttributeTask
{
    protected function run(): int
    {
        return parent::run();
    }
}