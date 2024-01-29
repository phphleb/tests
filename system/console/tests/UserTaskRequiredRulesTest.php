<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование правил валидации обязательных и необязательных аргументов.
 */
class UserTaskRequiredRulesTest extends TestCase
{
    private const BASE_LIST = [
        'IntegerRequiredName1' => 10001,
        'NumberRequiredName2' => 10002.15,
        // Так как строка запроса разбивается по символам - в результате массив строк.
        'ListRequiredName3' => ['test-n3', '10', '20', '0'],
        'StringRequiredName4' => 'test-n4',
        'IntegerName5' => 1005,
        'NumberName6' => 1006.15,
        'ListName7' => ['test-n7', '11', '21', '0'],
        'StringName8' => 'test-n8',
    ];

    private const BASE_COMMAND = [
        'IntegerRequiredName1' => '10001',          // --IntegerRequiredName1=10001
        'NumberRequiredName2' => '10002.15',        // --NumberRequiredName2=10002.15
        'ListRequiredName3' => '[test-n3,10,20,0]', // --ListRequiredName3=[test-n3,10,20,0]
        'StringRequiredName4' => 'test-n4',         // --StringRequiredName4=test-n4
        'IntegerName5' => '1005',                   // --IntegerName5=1005
        'NumberName6' => '1006.15',                 // --NumberName6=1006.15
        'ListName7' => '[test-n7,11,21,0]',         // --ListName7=[test-n7,11,21,0]
        'StringName8' => 'test-n8',                 // --StringName8=test-n8
    ];

    private const TASK_NAME = 'example/test3co9m31z0c019-task';

    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    public function testAllTaskCommand(): void
    {
        $commandResult = $this->console->runCli(self::TASK_NAME, $this->createCommand(self::BASE_COMMAND));
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === json_encode(self::BASE_LIST));
    }

    /**
     * Проверяется работоспособность при отсутствии всех необязательных аргументов.
     */
    public function testOptionalArgumentsV1(): void
    {
        $arg = self::BASE_COMMAND;
        unset($arg['IntegerName5'], $arg['NumberName6'], $arg['ListName7'], $arg['StringName8']);

        $expect = self::BASE_LIST;
        $expect['IntegerName5'] = 1;
        $expect['NumberName6'] = 1.1;
        $expect['ListName7'] = [];
        $expect['StringName8'] = '100500';

        $commandResult = $this->console->runCli(self::TASK_NAME, $this->createCommand($arg));
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === json_encode($expect));
    }

    /**
     * Проверяется вывод ошибки при отсутствии обязательного аргумента.
     */
    public function testRequiredArgumentV2(): void
    {
        $arg = self::BASE_COMMAND;
        unset($arg['IntegerRequiredName1']);

        $commandResult = $this->console->runCli(self::TASK_NAME, $this->createCommand($arg));
        $isError = str_starts_with($this->console->getContent(), 'ERROR');

        $this->assertTrue($isError);
    }

    private function createCommand(array $commands): array
    {
        $result = [];
        foreach ($commands as $name => $value) {
            $result[] = "--$name=$value";
        }
        return $result;
    }
}