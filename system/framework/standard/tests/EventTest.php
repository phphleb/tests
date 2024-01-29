<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы аттрибутов фреймворка.
 */
class EventTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testEventControllerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/index';
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $data = [
            'time' => '1970-12-10',
            'test' => 'changed',
            'constructTime' => 'DateTime',
        ];

        $this->assertArrayEquals($commandResult, $data);
    }

    public function testEventControllerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/event/after/1';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === '_AFTER_ONCE_TEST_AND_AFTER');
    }

    public function testEventControllerV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/event/after/2';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'AND_BEFORE2__AFTER_2_TEST_AND_AFTER2');
    }

    public function testEventControllerV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/event/args/1';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === '[CN_ARG-1=[arg]]');
    }

    public function testEventControllerV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/event/args/2';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === '[CN_ARG-2={arg2}]+Hleb\Reference\RequestReference]');
    }

    public function testEventMiddlewareV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/middleware';
        $commandResult = (array)json_decode($this->framework->run($params), true);


        $data = [
            'time' => '1970-10-10',
            'test' => 'changed',
            'constructTime' => 'DateTime',
            'after' => 0,
        ];

        $this->assertArrayEquals($commandResult, $data);
    }

    public function testEventMiddlewareV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/middleware/2';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === '_MD_AFTER_2_AFTER_EVENT_2__AFTER_3_TEST_');
    }

    public function testEventMiddlewareV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/middleware/args1';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === '{MD_ARG-1={arg}}[CN_ARG-1=[arg]]');
    }

    public function testEventMiddlewareAndControllerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/middleware/controller/1';
        $commandResult = $this->framework->run($params);

        $check = '{EV-MD-1-BEFORE=0}{MD-1}{EV-MD-1-AFTER=0}{EV-MD-2-BEFORE=0}{MD-2}{EV-MD-2-AFTER=0}{EV-CNT-1-BEFORE}' .
            '[CONTROLLER-1]{EV-CNT-1-AFTER}{EV-MD-3-BEFORE=1}{MD-3}{EV-MD-3-AFTER=1}';

        $this->assertTrue($commandResult === $check);
    }

    public function testEventModuleV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/module';
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $data = [
            'time' => '1970-12-12',
            'test' => 'changed',
            'constructTime' => 'DateTime',
            'module' => 'example-test',
        ];

        $this->assertArrayEquals($commandResult, $data);
    }

    public function testEventModuleV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/module/event/1';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === '_MODULE-1_EVENT_AFTER-1_');
    }

    public function testEventModuleV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/module/event/2';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'EVENT_BEFORE-2_example-test__MODULE-2_EVENT_AFTER-2_example-test_');
    }

    public function testEventModuleV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-event/controller/module/event/args/1';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === '_MODULE-3_[[arg]]');
    }

}