<?php

declare(strict_types=1);

namespace App\Commands\TestExample;

use Hleb\Base\Task;

/**
 * Базовая проверка размещения пользовательских консольных команд.
 *
 */
class Test1dbd4cda3ci4aTask extends Task
{
    /**
     * test-example/test_task_description
     */
    protected function run()
    {
        echo "test-example/test_task_message";

        return 0;
    }
}