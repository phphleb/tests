<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Этот набор тестов создан при помощи ChatGPT-4o
 */
class SeparateFunctionsTest extends TestCase
{
    public function __construct()
    {
        require_once __DIR__ . '/../functions.php';
    }

    public function testOnceFunction(): void
    {
        $counter = 0;
        $func = function () use (&$counter) {
            $counter++;
            return $counter;
        };

        $once = function(callable $func) {
            return once($func);
        };

        $result1 = $once($func);
        $result2 = $once($func);

        $condition = ($result1 === $result2) && ($counter === 1);
        $this->assertTrue($condition);
    }
}
