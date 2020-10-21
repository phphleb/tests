<?php
// Start  phpunit vendor/phphleb/tests/framework/unit/LaunchTaskTest.php

include  __DIR__ . "/../resources/TestChildTask.php";

use PHPUnit\Framework\TestCase;
use Phphleb\Tests\Framework\Resources\TestChildTask;

class LaunchTaskTest extends TestCase
{
    // Проверка на определение часа с правиьным запросом
    public function testTask()
    {
        $task = $this->executeTask('2020-10-20 04:04:04');
        $this->assertTrue($task->givenChildHour(4));
    }

    // Проверка на определение часа с неправильным запросом
    public function testTask2()
    {
        $task = $this->executeTask('2020-10-20 05:04:04');
        $this->assertFalse($task->givenChildHour(4));
    }

    // Проверка на определение часа с правильным запросом в массиве
    public function testTask3()
    {
        $task = $this->executeTask('2020-10-20 05:04:04');
        $this->assertTrue($task->givenChildHour([4,5,11]));
    }

    // Проверка на определение часа с неправильным запросом в массиве
    public function testTask4()
    {
        $task = $this->executeTask('2020-10-20 05:04:04');
        $this->assertFalse($task->givenChildHour([4,9,11]));
    }

    // Проверка на определение месяца с правильным запросом
    public function testTask5()
    {
        $task = $this->executeTask('2020-10-20 05:04:04');
        $this->assertTrue($task->givenChildMonth(10));
    }

    // Проверка на определение месяца с неправильным запросом
    public function testTask6()
    {
        $task = $this->executeTask('2020-10-20 05:04:04');
        $this->assertFalse($task->givenChildMonth(12));
    }

    // Проверка на определение минуты с правильным запросом и командой
    public function testTask7()
    {
        $task = $this->executeTask('2020-10-20 05:04:04');
        $this->assertTrue($task->givenChildMinutes(4, "cd ./"));
    }

    // Проверка на определение минуты с неправильным запросом и командой
    public function testTask8()
    {
        $task = $this->executeTask('2020-10-20 05:04:04');
        $this->assertFalse($task->givenChildMinutes(5, "cd ./"));
    }

    // Проверка на определение года на високосный с правильным запросом и командой
    public function testTask9()
    {
        $task = $this->executeTask('2020-10-20 05:04:04');
        $this->assertTrue($task->changeChildLeapYear());
    }

    // Проверка на определение года на високосный с правильным запросом и командой
    public function testTask10()
    {
        $task = $this->executeTask('2019-10-20 05:04:04');
        $this->assertFalse($task->changeChildLeapYear());
    }

    // Проверка на успешное сравнение текущего времени на время до полудня
    public function testTask11()
    {
        $task = $this->executeTask('2019-10-20 05:04:04');
        $this->assertTrue($task->changeAmChild());
    }

    // Проверка на неуспешное сравнение текущего времени на время до полудня
    public function testTask12()
    {
        $task = $this->executeTask('2019-10-20 15:04:04');
        $this->assertFalse($task->changeAmChild());
    }

    // Проверка на успешное сравнение текущего времени на время после полудня
    public function testTask13()
    {
        $task = $this->executeTask('2019-10-20 16:04:04');
        $this->assertTrue($task->changePmChild());
    }

    // Проверка на неуспешное сравнение текущего времени на время после полудня
    public function testTask14()
    {
        $task = $this->executeTask('2019-10-20 10:04:04');
        $this->assertFalse($task->changePmChild());
    }

    // Проверка на успешное сравнение по паттерну текущего времени на время после полудня
    public function testTask15()
    {
        $task = $this->executeTask('2019-10-20 10:04:04');
        $this->assertTrue($task->byPatternChild('Y-m-d H:i:s', '2019-10-20 10:04:04', 'cd ./'));
    }

    // Проверка на неуспешное сравнение по паттерну текущего времени на время после полудня
    public function testTask16()
    {
        $task = $this->executeTask('2019-10-20 10:04:04');
        $this->assertFalse($task->byPatternChild('Y-m-d H:i:s', '0000-00-00 00:00:00', 'cd ./'));
    }

    protected function executeTask($time)
    {
        $task = new TestChildTask();
        $date = new \DateTime($time);
        $task->setChildDate($date);
        return $task;
    }


}