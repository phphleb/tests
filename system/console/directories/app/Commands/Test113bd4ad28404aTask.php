<?php

declare(strict_types=1);

namespace App\Commands;

use Hleb\Base\Task;

/**
 * Базовая проверка работоспособности пользовательских консольных команд.
 */
class Test113bd4ad28404aTask extends Task
{
    /**
     * test_task_description
     */
    protected function run()
    {
        echo "test_task_message";

        return 0;
    }
}