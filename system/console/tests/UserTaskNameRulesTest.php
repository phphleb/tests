<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование сокращённых имён аргументов.
 */
class UserTaskNameRulesTest extends TestCase
{
    private const TASK_NAME = 'example/test4c54h11f0c020-task';

    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    /**
     * Проверка полного названия.
     */
    public function testTaskCommandFullName(): void
    {
        $arguments = ['--Name=#Name'];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === '#Name');
    }

    /**
     * Проверка одного из сокращённых названий.
     */
    public function testTaskCommandShortNameV1(): void
    {
        $arguments = ['-N1=#N1'];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === '#N1');
    }

    /**
     * Проверка одного из сокращённых названий.
     */
    public function testTaskCommandShortNameV2(): void
    {
        $arguments = ['-N2=#N2'];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === '#N2');
    }

    /**
     * Проверка полного названия при значении с пробелом.
     */
    public function testTaskCommandFullQuery(): void
    {
        $arguments = ['--Name="#Name & space"'];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === '#Name & space');
    }

    /**
     * Проверка одного из сокращённых названий при значении с пробелом.
     */
    public function testTaskCommandFullQueryNameV1(): void
    {
        $arguments = ['-N1="#N1 & space"'];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === '#N1 & space');
    }

}