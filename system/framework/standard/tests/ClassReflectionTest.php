<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use App\Controllers\HTestDiControllerEmptyConstruct;
use App\Dto\DiControllerEmptyDto;
use Hleb\Reference\LogReference;
use Phphleb\TestO\Di\ServiceExample;
use Phphleb\TestO\TestCase;

class ClassReflectionTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testControllerEmptyConstructV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/di/controller/empty-construct';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'array';

        $this->assertTrue($result);
    }

    public function testControllerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/di/controller/methods/index';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';

        $commandResult = $this->framework->run($params);
        $resultData = json_decode($commandResult, true);

        $target = ['time' => 'DateTime'];

        $this->assertArrayEquals($resultData, $target);
    }

    public function testControllerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/di/controller/methods/twoArgs';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';

        $commandResult = $this->framework->run($params);
        $resultData = json_decode($commandResult, true);

        $target = [
            'time' => 'DateTime',
            'dto' => DiControllerEmptyDto::class,
        ];

        $this->assertArrayEquals($resultData, $target);
    }

    public function testControllerV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/di/controller/methods/twoArgs';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';

        $commandResult = $this->framework->run($params);
        $resultData = json_decode($commandResult, true);

        $target = [
            'time' => 'DateTime',
            'dto' => DiControllerEmptyDto::class,
        ];

        $this->assertArrayEquals($resultData, $target);
    }

    public function testControllerV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/di/controller/methods/manyArgs';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';

        $commandResult = $this->framework->run($params);
        $resultData = json_decode($commandResult, true);

        $target = [
            'time' => 'DateTime',
            'dto' => DiControllerEmptyDto::class,
            'log' => LogReference::class,
            'test' => 'default',
            'null' => null,
            'log2' => LogReference::class,
        ];
        $this->assertArrayEquals($resultData, $target);
    }

    public function testControllerV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/di/controller/methods/dynamicArgs/100/500';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';

        $commandResult = $this->framework->run($params);
        $resultData = json_decode($commandResult, true);

        $target = [
            'arg1' => 100,
            'arg2' => 500,
            'dto' => DiControllerEmptyDto::class,
            'log' => LogReference::class,
        ];
        $this->assertArrayEquals($resultData, $target);
    }

    public function testControllerV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/di/controller/methods/dynamicArgs/100';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';

        $commandResult = $this->framework->run($params);
        $resultData = json_decode($commandResult, true);

        $target = [
            'arg1' => 100,
            'arg2' => null,
            'dto' => DiControllerEmptyDto::class,
            'log' => LogReference::class,
        ];
        $this->assertArrayEquals($resultData, $target);
    }

    public function testControllerV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/di/controller/methods/getConstruct';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';

        $commandResult = $this->framework->run($params);
        $resultData = json_decode($commandResult, true);

        $target = [
            'time' => 'DateTime',
            'dto' => DiControllerEmptyDto::class,
            'log' => LogReference::class,
        ];
        $this->assertArrayEquals($resultData, $target);
    }

    public function testControllerV8(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/di/controller/methods/getBefore';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';

        $commandResult = $this->framework->run($params);
        $resultData = json_decode($commandResult, true);

        $target = [];
        $this->assertArrayEquals($resultData, $target);
    }
}