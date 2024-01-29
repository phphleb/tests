<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

/**
 * Executing a command within another command.
 *
 * Выполнение команды внутри другой команды.
 */
class Test977vhh11mvf0h5Task extends Task
{
    protected function run(): int
    {
        $data = ['--Name=NAME:'];
        $task = new \App\Commands\Example\Test2c5dn101v10uiTask($this->config);
        $result = $task->call($data);

        // Добавляет к выводу код ответа вложенной команды.
        echo ((int)$result) . ':' . $task->getCode();

        return 0;
    }
}