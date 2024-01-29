<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

class Test2iod1276vc12cTask extends Task
{
    protected function run(string $arg)
    {
        echo '_TASK_EVENT-1_' . $arg;

        return 0;
    }
}