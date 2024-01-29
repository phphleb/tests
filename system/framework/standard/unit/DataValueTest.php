<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\HttpMethods\Specifier\DataType;
use Phphleb\TestO\TestCase;

class DataValueTest extends TestCase
{
    readonly \Throwable $exc;

    public function __construct()
    {
        $this->exc = new \ErrorException();

        require_once __DIR__ . '/../functions.php';
    }

    public function testDataValueV1(): void
    {
        $value = 'str';
        $result = (new DataType($value))->value;

        $this->assertTrue($result === $value);
    }

    public function testDataValueV2(): void
    {
        $value = null;
        $result = (new DataType($value))->value;

        $this->assertTrue($result === $value);
    }

    public function testDataValueV3(): void
    {
        $value = ['123'];
        $result = (new DataType($value))->value;

        $this->assertArrayEquals($result, $value);
    }

    public function testDataValueV4(): void
    {
        $value = 'str';
        $result = (new DataType($value))->value();

        $this->assertTrue($result === $value);
    }

    public function testDataValueV5(): void
    {
        $value = null;
        $result = (new DataType($value))->value();

        $this->assertTrue($result === $value);
    }

    public function testDataValueV6(): void
    {
        $value = ['123'];
        $result = (new DataType($value))->value();

        $this->assertArrayEquals($result, $value);
    }

    public function testDataValueV7(): void
    {
        $value = null;
        $result = (string)(new DataType($value));

        $this->assertTrue($result === '');
    }

    public function testDataValueV8(): void
    {
        $value = 123;
        $result = (string)(new DataType($value));

        $this->assertTrue($result === '123');
    }

    public function testDataValueV9(): void
    {
        $value = null;
        $result = (new DataType($value))->toInt();

        $this->assertTrue($result === 0);
    }

    public function testDataValueV10(): void
    {
        $value = 123;
        $result = (new DataType($value))->toString();

        $this->assertTrue($result === '123');
    }

    public function testDataValueV11(): void
    {
        $value = 123;
        $result = (new DataType($value))->toInt();

        $this->assertTrue($result === 123);
    }

    public function testDataValueV12(): void
    {
        $value = null;
        $result = (new DataType($value))->asInt();

        $this->assertTrue($result === 0);
    }

    public function testDataValueV13(): void
    {
        $value = null;
        $result = (new DataType($value))->asInt(10);

        $this->assertTrue($result === 10);
    }

    public function testDataValueV14(): void
    {
        $value = null;
        try {
            (new DataType($value))->asInt(exc: $this->exc::class);
            $result = false;
        } catch (\ErrorException) {
            $result = true;
        }

        $this->assertTrue($result);
    }

    public function testDataValueV15(): void
    {
        $value = 1;
        try {
            $result = (new DataType($value))->asInt(exc: $this->exc::class);
        } catch (\ErrorException) {
            $result = false;
        }

        $this->assertTrue((bool)$result);
    }

    public function testDataValueV16(): void
    {
        $value = null;
        $result = (new DataType($value))->asString();

        $this->assertTrue($result === null);
    }

    public function testDataValueV17(): void
    {
        $value = null;
        $result = (new DataType($value))->asString('10');

        $this->assertTrue($result === '10');
    }

    public function testDataValueV18(): void
    {
        $value = null;
        try {
            $result = (new DataType($value))->asString(exc: $this->exc::class);
        } catch (\ErrorException) {
            $result = true;
        }

        $this->assertTrue($result);
    }

    public function testDataValueV19(): void
    {
        $value = 123;
        $result = (new DataType($value))->asString('10');

        $this->assertTrue($result === '123');
    }

    public function testDataValueV20(): void
    {
        $value = [];
        try {
            $result =(new DataType($value))->asString();
        } catch (\Throwable) {
            $result = true;
        }

        $this->assertFalse((bool)$result);
    }

    public function testDataValueV21(): void
    {
        $value = null;
        $result = (new DataType($value))->asFloat();

        $this->assertTrue($result === 0.0);
    }

    public function testDataValueV22(): void
    {
        $value = 3.50;
        $result = (new DataType($value))->asFloat();

        $this->assertTrue($result === 3.50);
    }

    public function testDataValueV23(): void
    {
        $value = 1;
        $result = (new DataType($value))->asFloat();

        $this->assertTrue($result === 1.0);
    }

    public function testDataValueV24(): void
    {
        $value = '3.50';
        $result = (new DataType($value))->asFloat();

        $this->assertTrue($result === 3.50);
    }

    public function testDataValueV25(): void
    {
        $value = null;
        try {
            $result = (new DataType($value))->asFloat(exc: $this->exc::class);
        } catch (\ErrorException) {
            $result = true;
        }

        $this->assertTrue($result);
    }

    public function testDataValueV26(): void
    {
        $value = 10;
        $result = (new DataType($value))->asPositiveInt();

        $this->assertTrue($result === 10);
    }

    public function testDataValueV27(): void
    {
        $value = -10;
        $result = (new DataType($value))->asPositiveInt();

        $this->assertTrue($result === 0);
    }

    public function testDataValueV28(): void
    {
        $value = null;
        $result = (new DataType($value))->asPositiveInt();

        $this->assertTrue($result === 0);
    }

    public function testDataValueV29(): void
    {
        $value = 0.3;
        $result = (new DataType($value))->asPositiveInt();

        $this->assertTrue($result === 0);
    }

    public function testDataValueV30(): void
    {
        $value = 0.6;
        $result = (new DataType($value))->asPositiveInt();

        $this->assertTrue($result === 0);
    }

    public function testDataValueV31(): void
    {
        $value = null;
        try {
            $result = (new DataType($value))->asPositiveInt(exc: $this->exc::class);
        } catch (\ErrorException) {
            $result = true;
        }

        $this->assertTrue($result);
    }

    public function testDataValueV32(): void
    {
        $value = null;
        $result = (new DataType($value))->asBool();

        $this->assertTrue($result === false);
    }

    public function testDataValueV33(): void
    {
        $value = 1;
        $result = (new DataType($value))->asBool();

        $this->assertTrue($result);
    }

    public function testDataValueV34(): void
    {
        $value = 0;
        $result = (new DataType($value))->asBool();

        $this->assertFalse($result);
    }

    public function testDataValueV35(): void
    {
        $value = '1';
        $result = (new DataType($value))->asBool();

        $this->assertTrue($result);
    }

    public function testDataValueV36(): void
    {
        $value = '10';
        $result = (new DataType($value))->asBool();

        $this->assertFalse($result);
    }

    public function testDataValueV37(): void
    {
        $value = 'on';
        $result = (new DataType($value))->asBool(correct: ['on']);

        $this->assertTrue($result);
    }

    public function testDataValueV38(): void
    {
        $value = true;
        $result = (new DataType($value))->asBool(correct: ['on']);

        $this->assertFalse($result);
    }

    public function testDataValueV39(): void
    {
        $value = true;
        $result = (new DataType($value))->asBool();

        $this->assertTrue($result);
    }

    public function testDataValueV40(): void
    {
        $value = null;
        $result = (new DataType($value))->asBool(true);

        $this->assertTrue($result);
    }

    public function testDataValueV41(): void
    {
        $value = '0';
        $result = (new DataType($value))->asBool(true);

        $this->assertFalse($result);
    }

    public function testDataValueV42(): void
    {
        $value = null;
        try {
            $result = (new DataType($value))->asBool(exc: $this->exc::class);
        } catch (\ErrorException) {
            $result = true;
        }

        $this->assertTrue($result);
    }

    public function testDataValueV43(): void
    {
        $value = null;
        $result = (new DataType($value))->asArray();

        $this->assertArrayEquals($result, []);
    }

    public function testDataValueV44(): void
    {
        $value = ['1234'];
        $result = (new DataType($value))->asArray();

        $this->assertArrayEquals($result, ['1234']);
    }

    public function testDataValueV45(): void
    {
        $value = '1234';
        $result = (new DataType($value))->asArray();

        $this->assertArrayEquals($result, []);
    }

    public function testDataValueV46(): void
    {
        $value = '1234';
        $result = (new DataType($value))->asArray(['123']);

        $this->assertArrayEquals($result, ['123']);
    }

    public function testDataValueV47(): void
    {
        $value = json_encode(['test' => 123]);
        $result = (new DataType($value))->asArray();

        $this->assertArrayEquals($result, ['test' => 123]);
    }

    public function testDataValueV48(): void
    {
        $value = '{"test": 123}';
        $result = (new DataType($value))->asArray();

        $this->assertArrayEquals($result, ['test' => 123]);
    }

    public function testDataValueV49(): void
    {
        $value = null;
        try {
            (new DataType($value))->asBool(exc: $this->exc::class);
            $result = false;
        } catch (\ErrorException) {
            $result = true;
        }

        $this->assertTrue($result);
    }

    public function testDataValueV50(): void
    {
        $value = '0';
        $result = (new DataType($value))->limitInt();

        $this->assertTrue($result === 0);
    }

    public function testDataValueV51(): void
    {
        $value = -7;
        $result = (new DataType($value))->limitInt();

        $this->assertTrue($result === 0);
    }

    public function testDataValueV52(): void
    {
        $value = 1_000_000;
        $result = (new DataType($value))->limitInt();

        $this->assertTrue($result === 1_000_000);
    }

    public function testDataValueV53(): void
    {
        $value = 1_000;
        $result = (new DataType($value))->limitInt(max: 100);

        $this->assertTrue($result === 100);
    }

    public function testDataValueV54(): void
    {
        $value = null;
        $result = (new DataType($value))->limitInt(default: 100);

        $this->assertTrue($result === 100);
    }

    public function testDataValueV55(): void
    {
        $value = -30;
        $result = (new DataType($value))->limitInt(min: -20, max: 20);

        $this->assertTrue($result === -20);
    }

    public function testDataValueV56(): void
    {
        $value = 10;
        $result = (new DataType($value))->limitInt(min: -20, max: 20);

        $this->assertTrue($result === 10);
    }

    public function testDataValueV57(): void
    {
        $value = 50;
        $result = (new DataType($value))->limitInt(min: -20, max: 20);

        $this->assertTrue($result === 20);
    }

    public function testDataValueV58(): void
    {
        $value = null;
        try {
            (new DataType($value))->asBool(exc: $this->exc::class);
            $result = false;
        } catch (\ErrorException) {
            $result = true;
        }

        $this->assertTrue($result);
    }

}