<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование возвращаемых ошибок.
 */
class UserTaskErrorTest extends TestCase
{
    private const TASK_NAME1 = 'test-example/test3d7d0ffc3cw8d-task';

    private const TASK_NAME2 = 'test-example/test9c10i0cc22w3n-task';

    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    public function testTaskErrorException(): void
    {
        $commandResult = $this->console->runCli(self::TASK_NAME2);
        $result = $this->console->getContent();

        $this->assertTrue(!$commandResult && $result === 'CONSOLE_ERROR_EXCEPTION_TEST');
    }

    public function testTaskErrorLog(): void
    {
        $this->console->runCli(self::TASK_NAME1);
        $result = $this->console->getContent() === 'ERROR: CONSOLE_ERROR_TEST';

        $this->assertTrue($result);
    }

}