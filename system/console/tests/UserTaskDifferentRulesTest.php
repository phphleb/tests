<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование именованных аргументов и неименованных значений вместе.
 */
class UserTaskDifferentRulesTest extends TestCase
{
    private const BASE_LIST = [
        'integerValue' => 1001,
        'floatValue' => 1002.15,
        'differentValue' => -1003,
        'testValue' => 1004,
        'TestName' => '1005',
    ];

    private const BASE_COMMAND = [
        '1001', // $integerValue
        '1002.15', // $floatValue
        '-1003', // $differentValue
        '1004', // $testValue
        '--TestName=1005', // --TestName
    ];

    private const TASK_NAME = 'example/test7u1412mmvi001-task';

    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    /**
     * Проверка на соответствие всех аргументов.
     */
    public function testAllTaskCommand(): void
    {
        $commandResult = $this->console->runCli(self::TASK_NAME, self::BASE_COMMAND);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === json_encode(self::BASE_LIST));
    }

    /**
     * Проверка на значения по умолчанию.
     */
    public function testSubsequenceTaskCommandV1(): void
    {
        $commandsArguments = array_slice(self::BASE_COMMAND, 0, 3);
        $returnArguments = array_slice(self::BASE_LIST, 0, 3);
        $returnArguments = array_merge($returnArguments, [
            'testValue' => 0,
            'TestName' => null,
        ]);

        $commandResult = $this->console->runCli(self::TASK_NAME, $commandsArguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === json_encode($returnArguments));
    }

    /**
     * Проверка на строковое значение для переменной с двумя типами.
     */
    public function testSubsequenceTaskCommandV2(): void
    {
        $commandsArguments = array_slice(self::BASE_COMMAND, 0, 2);
        $commandsArguments[] = 'str';
        $returnArguments = array_slice(self::BASE_LIST, 0, 2);
        $returnArguments = array_merge($returnArguments, [
            'differentValue' => 'str',
            'testValue' => 0,
            'TestName' => null,
        ]);

        $commandResult = $this->console->runCli(self::TASK_NAME, $commandsArguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === json_encode($returnArguments));
    }

    /**
     * Проверка конвертации аргументов в указанный формат.
     */
    public function testSubsequenceTaskCommandV3(): void
    {
        $commandsArguments = array_slice(self::BASE_COMMAND, 0, 2);
        $commandsArguments[] = '1009.15';
        $commandsArguments[] = '110';
        $returnArguments = array_slice(self::BASE_LIST, 0, 2);
        $returnArguments = array_merge($returnArguments, [
            'differentValue' => '1009.15', // Конвертация в строку
            'testValue' => 110, // Конвертация в числовое значение
            'TestName' => null,
        ]);

        $commandResult = $this->console->runCli(self::TASK_NAME, $commandsArguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === json_encode($returnArguments));
    }
}