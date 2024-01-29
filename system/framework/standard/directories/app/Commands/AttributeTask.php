<?php

namespace App\Commands;

use Hleb\Base\Task;

class AttributeTask extends Task
{
    protected function run(): int
    {
        $this->setResult('TEST-ATTRIBUTE-TASK');

        return self::SUCCESS_CODE;
    }
}