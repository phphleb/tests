<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Helpers\StringHelper;
use Phphleb\TestO\TestCase;

class StringHelperTest extends TestCase
{
    public function testStringHelperV1(): void
    {
        $str = 'test 12345';
        $result = StringHelper::compare($str, $str);
        $this->assertFalse((bool)$result);
    }

    public function testStringHelperV2(): void
    {
        $str = '';
        $result = StringHelper::compare($str, $str);
        $this->assertFalse((bool)$result);
    }

    public function testStringHelperV3(): void
    {
        $str = '0';
        $result = StringHelper::compare($str, $str);
        $this->assertFalse((bool)$result);
    }

    public function testStringHelperV4(): void
    {
        $str1 = '1abCDf';
        $str2 = '1abCE';
        $result = StringHelper::compare($str1, $str2);
        $test = [
            ['first' => 'D', 'second' => 'E', 'pos' => 4, 'error' => 'does not match', 'err' => 3],
            ['first' => 'f', 'pos' => 5, 'error' => 'not in second', 'err' => 1],
        ];
        $this->assertArrayEquals($result, $test);
    }

    public function testStringHelperV5(): void
    {
        $str1 = '1abcDr';
        $str2 = '1abcErR';
        $result = StringHelper::compare($str1, $str2);
        $test = [
            ['first' => 'D', 'second' => 'E', 'pos' => 4, 'error' => 'does not match', 'err' => 3],
            ['second' => 'R', 'pos' => 6, 'error' => 'not in first', 'err' => 2],
        ];
        $this->assertArrayEquals($result, $test);
    }
}