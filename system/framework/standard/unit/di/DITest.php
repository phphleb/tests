<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Constructor\DI\DependencyInjection;
use Hleb\Helpers\ReflectionMethod;
use Hleb\Reference\LogReference;
use Hleb\Reference\RequestReference;
use Phphleb\TestO\Di\ControllerBeforeActionExample;
use Phphleb\TestO\Di\ControllerConstructExample;
use Phphleb\TestO\Di\ControllerMethodExample;
use Phphleb\TestO\Di\EmptyDto;
use Phphleb\TestO\Di\ServiceExample;
use Phphleb\TestO\TestCase;

class DITest extends TestCase
{
    public function __construct()
    {
        if (!class_exists(ServiceExample::class)) {
            require __DIR__ . '/source/ServiceExample.php';
        }
        if (!class_exists(ControllerConstructExample::class)) {
            require __DIR__ . '/source/ControllerConstructExample.php';
        }
        if (!class_exists(ControllerBeforeActionExample::class)) {
            require __DIR__ . '/source/ControllerBeforeActionExample.php';
        }
        if (!class_exists(ControllerMethodExample::class)) {
            require __DIR__ . '/source/ControllerMethodExample.php';
        }
        if (!class_exists(EmptyDto::class)) {
            require __DIR__ . '/source/EmptyDto.php';
        }
    }

    /**
     * @throws \AsyncExitException
     */
    public function testDiControllerConstructClassV1(): void
    {
       $ref = new ReflectionMethod(ControllerConstructExample::class, '__construct');
       $di = DependencyInjection::prepare($ref, ['info' => []]);

       $controller = new ControllerConstructExample(...$di);
       $data = [
           'config' => 'array',
           'log' => LogReference::class,
           'request' => RequestReference::class,
           'dto' => EmptyDto::class,
           'service' => ServiceExample::class,
           'service.log' => LogReference::class,
           'service.test' => 'default',
       ];
       $this->assertArrayEquals($controller->getConstructData(), $data);
    }

    public function testDiControllerBeforeActionMethodV1(): void
    {
        $controller = new ControllerBeforeActionExample();

        $this->assertTrue($controller->data === '');
    }

    public function testDiControllerActionMethodV1(): void
    {
        $controller = new ControllerMethodExample();
        $ref = new ReflectionMethod($controller::class, 'action');
        $di = DependencyInjection::prepare($ref);
        $controller->action(...$di);
        $data = [
            'log' => LogReference::class,
            'request' => RequestReference::class,
            'dto' => EmptyDto::class,
            'service' => ServiceExample::class,
            'test' => 'default'
        ];
        $this->assertArrayEquals($controller->data, $data);
    }

    public function testDiControllerActionMethodV2(): void
    {
        $controller = new ControllerMethodExample();
        $ref = new ReflectionMethod($controller::class, 'action2');
        $di = DependencyInjection::prepare($ref, ['test' => 'default']);
        $controller->action(...$di);
        $data = [
            'log' => LogReference::class,
            'request' => RequestReference::class,
            'dto' => EmptyDto::class,
            'service' => ServiceExample::class,
            'test' => 'default'
        ];
        $this->assertArrayEquals($controller->data, $data);
    }
}