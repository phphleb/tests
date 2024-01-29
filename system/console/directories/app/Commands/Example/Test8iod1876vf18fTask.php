<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

class Test8iod1876vf18fTask extends Task
{
    protected function run(string $arg)
    {
        echo '_TASK_EVENT-2_' . $arg;

        $this->setResult('[first]');

        return 0;
    }
}