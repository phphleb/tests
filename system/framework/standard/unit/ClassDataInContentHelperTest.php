<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Helpers\ClassDataInFile;
use Phphleb\TestO\TestCase;

class ClassDataInContentHelperTest extends TestCase
{
    public function testClassDataInContentV1(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleClass.php'))->isClass();

        $this->assertTrue($result);
    }

    public function testClassDataInContentV2(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleFileWithNamespace.php'))->isClass();

        $this->assertFalse($result);
    }

    public function testClassDataInContentV3(): void
    {
       $result = (new ClassDataInFile(__DIR__ . '/source/Based3bd4ad28404aaa57cdad55fd43dd6b6Class.php'))->isClass();

        $this->assertTrue($result);
    }

    public function testClassDataInContentV4(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleClass.php'))->getClass();

        $this->assertTrue($result === 'Phphleb\Tests\ExampleClass');
    }

    public function testClassDataInContentV5(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleClass.php'))->getNamespace();

        $this->assertTrue($result === 'Phphleb\Tests');
    }

    public function testClassDataInContentV6(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/Based3bd4ad28404aaa57cdad55fd43dd6b6Class.php'))->getClass();

        $this->assertTrue($result === 'Based3bd4ad28404aaa57cdad55fd43dd6b6Class');
    }

    public function testClassDataInContentV7(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleTrait.php'))->getClass();

        $this->assertTrue($result === 'Phphleb\Tests\ExampleTrait');
    }

    public function testClassDataInContentV8(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleInterface.php'))->getClass();

        $this->assertTrue($result === 'Phphleb\Tests\ExampleInterface');
    }

    public function testClassDataInContentV9(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleInterface.php'))->isInterface();

        $this->assertTrue($result);
    }

    public function testClassDataInContentV10(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleInterface.php'))->isTrait();

        $this->assertFalse($result);
    }

    public function testClassDataInContentV11(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleInterface.php'))->isStandardClass();

        $this->assertFalse($result);
    }

    public function testClassDataInContentV12(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleTrait.php'))->isStandardClass();

        $this->assertFalse($result);
    }

    public function testClassDataInContentV13(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleTrait.php'))->isInterface();

        $this->assertFalse($result);
    }

    public function testClassDataInContentV14(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/ExampleTrait.php'))->isTrait();

        $this->assertTrue($result);
    }

    public function testClassDataInContentV15(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/Static/StaticClass.php'))->getClass();

        $this->assertTrue($result === 'Phphleb\Tests\Static\StaticClass');
    }

    public function testClassDataInContentV16(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/Init/StaticClass.php'))->getClass();

        $this->assertTrue($result === 'Phphleb\Tests\Init\StaticClass');
    }

    public function testClassDataInContentV17(): void
    {
        $result = (new ClassDataInFile(__DIR__ . '/source/file.php'))->isClass();

        $this->assertFalse($result);
    }
}