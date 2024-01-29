<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use FirstTestAttribute;
use FirstTestMethodAttribute;
use Hleb\Helpers\AttributeHelper;
use Phphleb\TestO\TestCase;
use SecondTestAttribute;
use SecondTestMethodAttribute;

class AttributeHelperTest extends TestCase
{
    private AttributeHelper $helper;

    public function __construct()
    {
        if (!class_exists('Test0AttributeHelperExample')) {
            require __DIR__ . '/source/Test0AttributeHelperExample.php';
        }
        if (!class_exists('FirstTestAttribute')) {
            require __DIR__ . '/source/FirstTestAttribute.php';
        }
        if (!class_exists('SecondTestAttribute')) {
            require __DIR__ . '/source/SecondTestAttribute.php';
        }
        if (!class_exists('FirstTestMethodAttribute')) {
            require __DIR__ . '/source/FirstTestMethodAttribute.php';
        }
        if (!class_exists('SecondTestMethodAttribute')) {
            require __DIR__ . '/source/SecondTestMethodAttribute.php';
        }
        $this->helper = new AttributeHelper(\Test0AttributeHelperExample::class);
    }

    public function testGetFromClassV1(): void
    {
        $result = $this->helper->getFromClass();
        $data = [
            'FirstTestAttribute' => FirstTestAttribute::class,
            'SecondTestAttribute' => SecondTestAttribute::class,
        ];
        foreach($result as $key => $value) {
            $result[$key] = $value::class;
        }

        $this->assertArrayEquals($result, $data);
    }

    public function testGetFromMethodV1(): void
    {
        $result = $this->helper->getFromMethod('test');
        $data = [
            'FirstTestMethodAttribute' => FirstTestMethodAttribute::class,
            'SecondTestMethodAttribute' => SecondTestMethodAttribute::class,
        ];
        foreach($result as $key => $value) {
            $result[$key] = $value::class;
        }

        $this->assertArrayEquals($result, $data);
    }

    public function testHasClassAttributeV1(): void
    {
        $result = $this->helper->hasClassAttribute('FirstTestAttribute');

        $this->assertTrue($result);
    }

    public function testHasClassAttributeV2(): void
    {
        $result = $this->helper->hasClassAttribute('UndefinedTestAttribute');

        $this->assertFalse($result);
    }

    public function testGetClassValueV1(): void
    {
        $result = $this->helper->getClassValue('FirstTestAttribute', 'value');
        $this->assertTrue($result === 1234);
    }

    public function testHasMethodAttributeV1(): void
    {
        $result = $this->helper->hasMethodAttribute('test', 'FirstTestMethodAttribute');

        $this->assertTrue($result);
    }

    public function testHasMethodAttributeV2(): void
    {
        $result = $this->helper->hasMethodAttribute('test', 'UndefinedTestMethodAttribute');

        $this->assertFalse($result);
    }

    public function testGetMethodValueV1(): void
    {
        $result = $this->helper->getMethodValue('test', 'FirstTestMethodAttribute', 'value');
        $this->assertTrue($result === 'abc');
    }

    public function testGetMethodValueV2(): void
    {
        $result = $this->helper->getMethodValue('test', 'FirstTestMethodAttribute', 'value0');
        $this->assertTrue($result === null);
    }

    public function testGetMethodValueV3(): void
    {
        $result = $this->helper->getMethodValue('test', 'FirstTestMethodAttribute0', 'value');
        $this->assertTrue($result === null);
    }

    public function testGetClassValueV2(): void
    {
        $result = $this->helper->getClassValue('FirstTestAttribute', 'value0');
        $this->assertTrue($result === null);
    }
}