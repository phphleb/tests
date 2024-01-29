<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование правил валидации именованных параметров.
 */
class UserTaskRulesTest extends TestCase
{
    private const TASK_NAME1 = 'example/test2c5dn101v10ui-task';
    private const TASK_NAME2 = 'example/test2co9n31z0ca19-task';

    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    /**
     * Проверка работы команды без аргумента с дефолтным значением.
     */
    public function testTaskCommandWithoutArgumentWithDefault(): void
    {
        $commandResult = $this->console->runCli(self::TASK_NAME1);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === 'arg-test-undefined');
    }

    /**
     * Проверка работы команды c именованным аргументом.
     */
    public function testTaskCommandWithArgument(): void
    {
        $commandResult = $this->console->runCli(self::TASK_NAME1, ['--Name=test-name-value']);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === 'test-name-value');
    }

    public function testTaskShortCommandWithArgument(): void
    {
        $commandResult = $this->console->runCli(self::TASK_NAME1, ['-N=test-name-value']);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === 'test-name-value');
    }

    /**
     * Проверка при наличии нескольких (всех) аргументов.
     */
    public function testTaskCommandWithAllArgumentsN1(): void
    {
        $checkValues = [
            'test-argument-1',
            'test-argument-2',
            'test-argument-3',
        ];
        $arguments = [
            '--Name1=' . $checkValues[0],
            '--Name2=' . $checkValues[1],
            '--Name3=' . $checkValues[2],
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME2, $arguments);
        $result = trim($this->console->getContent());

        $this->assertTrue($commandResult && $result === implode(':', $checkValues));
    }

    public function testTaskCommandWithQuietN2(): void
    {
        $arguments = [
            '--Name1=1',
            '--Name2=2',
            '--Name3=3',
            '--quiet',
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME2, $arguments);
        $result = trim($this->console->getContent());

        $this->assertTrue($commandResult && $result === '');
    }

    /**
     * Проверка при наличии нескольких (всех) сокращенных аргументов.
     */
    public function testTaskCommandWithAllArgumentsN2(): void
    {
        $checkValues = [
            'test-argument-1',
            'test-argument-2',
            'test-argument-3',
        ];
        $arguments = [
            '-N1=' . $checkValues[0],
            '-N2=' . $checkValues[1],
            '-N3=' . $checkValues[2],
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME2, $arguments);
        $result = trim($this->console->getContent());

        $this->assertTrue($commandResult && $result === implode(':', $checkValues));
    }
}