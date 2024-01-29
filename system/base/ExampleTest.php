<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Sample class for tests.
 * The file name must end with 'Test.php'.
 * The class must be derived from TestCase.
 *
 * Пример класса для тестов.
 * Название файла должно заканчиваться на 'Test.php'.
 * Класс должен быть производным от TestCase.
 */
class ExampleTest extends TestCase
{
    /**
     * An example of calling a check for a positive boolean value.
     * For testing purposes, the method name must begin with 'test'.
     *
     * Пример вызова проверки на положительное булево значение.
     * Для тестирования, название метода должно начинаться с 'test'.
     */
    public function testExampleFirstMethod(): void
    {
        $this->assertTrue(condition:true);
    }

    /**
     * An example of calling a test for a negative boolean value.
     * For testing purposes, the method name must begin with 'test'.
     *
     * Пример вызова проверки на отрицательноебулево значение.
     * Для тестирования, название метода должно начинаться с 'test'.
     */
    public function testExampleSecondMethod(): void
    {
        $this->assertFalse(condition:false);
    }
}