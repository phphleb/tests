<?php

declare(strict_types=1);

namespace App\Commands\TestExample;

use Hleb\Base\Task;
use Phphleb\Tests\TestConsoleErrorException;

/**
 * Проверка обработки консольных ошибок.
 *
 */
class Test9c10i0cc22w3nTask extends Task
{
    /**
     * @throws TestConsoleErrorException
     */
    protected function run()
    {
        throw new TestConsoleErrorException('CONSOLE_ERROR_EXCEPTION_TEST');
    }
}