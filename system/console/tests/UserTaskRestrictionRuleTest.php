<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование задаваемых значений с ограничениями.
 */
class UserTaskRestrictionRuleTest extends TestCase
{
    private const TASK_NAME = 'example/test85t4h14fvr090-task';

    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    /**
     * Проверка общей работоспособности ограничений для строкового типа.
     */
    public function testTaskCommandStringNameV1(): void
    {
        $arguments = [
            '--StringName1=123456',
            '--StringName2="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."',
        ];
        $preference = json_encode([
            'StringName1' => '123456',
            'StringName2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === $preference);
    }

    /**
     * Проверка общей работоспособности ограничений для сокращенных названий.
     */
    public function testTaskCommandStringNameV2(): void
    {
        $arguments = [
            '-SN1=1234567',
            '-SN2="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."',
        ];
        $preference = json_encode([
            'StringName1' => '1234567',
            'StringName2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === $preference);
    }

    /**
     * Проверка для невалидных значений строкового типа.
     */
    public function testTaskCommandStringNameV3(): void
    {
        $arguments = [
            '--StringName1=1234', // < 5
            '--StringName2="1234"', // < 5
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue(str_starts_with($result, 'ERROR'));
    }

    /**
     * Проверка для невалидных значений для сокращенных названий.
     */
    public function testTaskCommandStringNameV4(): void
    {
        $arguments = [
            '-SN1=1234', // < 5
            '-SN2="1234"', // < 5
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue(str_starts_with($result, 'ERROR'));
    }

    /**
     * Проверка общей работоспособности ограничений для числового типа.
     */
    public function testTaskCommandNumberNameV1(): void
    {
        $arguments = [
            '--IntegerName1=11',
            '--IntegerName2=100900',
        ];
        $preference = json_encode([
            'IntegerName1' => 11,
            'IntegerName2' => 100900,
        ]);
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === $preference);
    }

    public function testTaskCommandNumberNameV2(): void
    {
        $arguments = [
            '-IN1=26',
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue(str_starts_with($result, 'ERROR'));
    }

    public function testTaskCommandNumberNameV3(): void
    {
        $arguments = [
            '-IN2="9"',
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue(str_starts_with($result, 'ERROR'));
    }

    /**
     * Проверка общей работоспособности ограничений для типа float.
     */
    public function testTaskCommandFloatNameV1(): void
    {
        $arguments = [
            '--NumberName1=10.6',
            '--NumberName2=100900',
        ];
        $preference = json_encode([
            'NumberName1' => 10.6,
            'NumberName2' => 100900,
        ]);
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === $preference);
    }

    public function testTaskCommandFloatNameV2(): void
    {
        $arguments = [
            '-NN1=26',
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue(str_starts_with($result, 'ERROR'));
    }

    public function testTaskCommandFloatNameV3(): void
    {
        $arguments = [
            '-NN2=9',
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue(str_starts_with($result, 'ERROR'));
    }

    /**
     * Проверка общей работоспособности ограничений для типа array.
     */
    public function testTaskCommandArrayNameV1(): void
    {
        $arguments = [
            '--ListName1=[1,2,3,4]',
            '--ListName2=[1,2,3,4,5,6,7,8,9]',
        ];
        $preference = json_encode([
            'ListName1' => ['1','2','3','4'],
            'ListName2' => ['1','2','3','4','5','6','7','8','9'],
        ]);
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && $result === $preference);
    }

    public function testTaskCommandArrayNameV2(): void
    {
        $arguments = [
            '-NN1=[1,2,3,4,5,6,7,8,9]',
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue(str_starts_with($result, 'ERROR'));
    }

    public function testTaskCommandArrayNameV3(): void
    {
        $arguments = [
            '-NN2=[1,2]',
        ];
        $commandResult = $this->console->runCli(self::TASK_NAME, $arguments);
        $result = $this->console->getContent();

        $this->assertTrue(str_starts_with($result, 'ERROR'));
    }

}