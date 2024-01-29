<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование передаваемых флагов как аргументы.
 */
class UserTaskLabelRuleTest extends TestCase
{
    private const TASK_NAME = 'example/test6674hhnfvf099-task';

    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    /**
     * Проверка флага на существование.
     */
    public function testTaskCommandFullName(): void
    {
        $arguments = ['--TestName'];
        $preference = json_encode([
            'TestName' => 1,
        ]);
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === $preference);
    }

    /**
     * Проверка флага на отсутствие.
     */
    public function testTaskCommandEmptyFullName(): void
    {
        $preference = json_encode([
            'TestName' => 0,
        ]);
        $commandResult = $this->console->runCli(self::TASK_NAME, []);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === $preference);
    }

}