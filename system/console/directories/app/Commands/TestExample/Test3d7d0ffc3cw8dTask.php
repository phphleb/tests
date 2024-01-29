<?php

declare(strict_types=1);

namespace App\Commands\TestExample;

use Hleb\Base\Task;

/**
 * Проверка обработки консольных ошибок.
 *
 */
class Test3d7d0ffc3cw8dTask extends Task
{
    protected function run()
    {
        $this->container->log()->error('CONSOLE_ERROR_TEST');
    }
}