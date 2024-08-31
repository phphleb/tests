<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Этот набор тестов создан при помощи ChatGPT-4o
 */
class SeparateFunctionsTest extends TestCase
{
    public function testOnceFunction(): void
    {
        $counter = 0;
        $func = function () use (&$counter) {
            $counter++;
            return $counter;
        };

        $result1 = once($func);
        $result2 = once($func);

        $condition = ($result1 === $result2) && ($counter === 1);
        $this->assertTrue($condition);
    }

    public function testArrayFindFunction(): void
    {
        $array = [1, 2, 3, 4, 5];

        $result = array_find($array, fn($value) => $value > 3);
        $resultNull = array_find($array, fn($value) => $value > 5);

        $condition = ($result === 4) && ($resultNull === null);
        $this->assertTrue($condition);
    }

    public function testArrayFindKeyFunction(): void
    {
        $array = ['a' => 1, 'b' => 2, 'c' => 3];

        $key = array_find_key($array, fn($value) => $value === 2);
        $keyNull = array_find_key($array, fn($value) => $value === 4);

        $condition = ($key === 'b') && ($keyNull === null);
        $this->assertTrue($condition);
    }

    public function testArrayAllFunction(): void
    {
        $array = [2, 4, 6, 8];

        $result = array_all($array, fn($value) => $value % 2 === 0);
        $arrayWithOdd = [2, 3, 4];
        $resultFalse = array_all($arrayWithOdd, fn($value) => $value % 2 === 0);

        $this->assertTrue($result && !$resultFalse);
    }

    public function testArrayAnyFunction(): void
    {
        $array = [1, 2, 3, 4];

        $result = array_any($array, fn($value) => $value % 2 === 0);
        $arrayAllOdd = [1, 3, 5];
        $resultFalse = array_any($arrayAllOdd, fn($value) => $value % 2 === 0);

        $this->assertTrue($result && !$resultFalse);
    }
}
