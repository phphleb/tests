<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use App\Dto\DiControllerEmptyDto;
use Hleb\Reference\LogReference;
use Phphleb\TestO\TestCase;

/**
 * Тестирование консольных команд фреймворка на работоспособность.
 */
class SystemTaskTest extends TestCase
{
    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    /**
     * Проверка работы пользовательских команд в базовом виде.
     */
    public function testTaskCommand(): void
    {
        $commandResult = $this->console->runCli('test113bd4ad28404a-task');
        $result = $this->console->getContent();

        $this->assertTrue($result === 'test_task_message');
    }

    /**
     * Проверка получения описания из консольной команды.
     */
    public function testTaskCommandHelp(): void
    {
        $commandResult = $this->console->runCli('test113bd4ad28404a-task', ['--desc']);
        $result = $this->console->getContent();
        $result = $commandResult && str_contains($result, 'test_task_description');

        $this->assertTrue($result);
    }

    /**
     * Проверка получения подсказки из консольной команды.
     */
    public function testTaskCommandTextHelp(): void
    {
        $commandResult = $this->console->runCli('test113bd4ad28404a-task', ['--help']);
        $result = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($result), 'Usage');

        $this->assertTrue($result);
    }

    /**
     * Проверка размещения консольной команды во вложенной директории команд.
     */
    public function testExampleTaskCommand(): void
    {
        $commandResult = $this->console->runCli('test-example/test1dbd4cda3ci4a-task');
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === 'test-example/test_task_message');
    }

    public function testExampleTaskCommandHelp(): void
    {
        $commandResult = $this->console->runCli('test-example/test1dbd4cda3ci4a-task', ['--desc']);
        $result = $this->console->getContent();
        $result = $commandResult && str_contains($result, 'test-example/test_task_description');

        $this->assertTrue($result);
    }

    public function testExampleTaskCommandEmpty(): void
    {
        $commandResult = $this->console->runCli('test-example/test1aad1ida3c77a-task');
        $result = trim($this->console->getContent());

        $this->assertTrue($commandResult && empty($result));
    }

    public function testExampleTaskCommandEmptyHelp(): void
    {
        $commandResult = $this->console->runCli('test-example/test1aad1ida3c77a-task', ['--desc']);
        $result = trim($this->console->getContent());

        $this->assertTrue($commandResult && empty($result));
    }

    public function testExampleTaskCommandError(): void
    {
        $commandResult = $this->console->runCli('example/test1iod1176vc11c-task');

        $this->assertFalse($commandResult);
    }

    public function testExampleReflectionTaskV1(): void
    {
        $this->console->runCli('example/testdi2d2106vc6c-task');
        $result = $this->console->getContent();
        $resultData = json_decode($result, true);

        $target = [
            'time' => 'DateTime',
            'log' => LogReference::class,
        ];
        $this->assertArrayEquals($resultData, $target);
    }
}