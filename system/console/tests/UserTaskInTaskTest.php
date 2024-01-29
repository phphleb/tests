<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование команды внутри другой команды.
 */
class UserTaskInTaskTest extends TestCase
{
    private const TASK_NAME = 'example/test977vhh11mvf0h5-task';

    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    public function testAllTaskCommand(): void
    {
        $commandResult = $this->console->runCli(self::TASK_NAME);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === 'NAME:1:0');
    }
}