<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Helpers\ArrayWriting;
use Phphleb\TestO\TestCase;

class ArrayWritingHelperTest extends TestCase
{
    public function testStringHelperGetStringV1(): void
    {
        $array = [
            'param1' => 'string_value',
            'param2' => 15,
            'param3' => ['string_value', 10],
            'param4' => [],
        ];
        $result = (new ArrayWriting())->getString($array, 4);

        $this->assertArrayEquals($array, eval('return ' . $result . ';'));
    }

    public function testStringHelperGetStringV2(): void
    {
        $result = (new ArrayWriting())->getString([], 4);
        $this->assertTrue($result === "[]");
    }
}