<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка не динамических маршрутов с условиями where().
 */
class WhereRoutesTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    /**
     * Проверка базового совпадения с условиями.
     */
    public function testWhereRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/1200/second/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:1200|second';

        $this->assertTrue($result);
    }

    /**
     * Проверка базового совпадения с неправильными условиями.
     */
    public function testWhereRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/0abc/second/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    /**
     * Проверка базового совпадения с неправильными условиями.
     */
    public function testWhereRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/1200/CAPSLOCK/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:1200|CAPSLOCK';

        $this->assertFalse($result);
    }

    public function testWhereRouteV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/CAPSLOCK/1200/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:CAPSLOCK|1200';

        $this->assertTrue($result);
    }

    public function testWhereRouteV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/CAPSLOCK';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:CAPSLOCK';

        $this->assertTrue($result);
    }

    public function testWhereRouteV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/1200';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testWhereRouteV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/user/name/@name';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:name';

        $this->assertTrue($result);
    }

    public function testWhereRouteV8(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/full/regexp/name';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:name';

        $this->assertTrue($result);
    }

    public function testWhereRouteV9(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/full/regexp/NAME';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:NAME';

        $this->assertTrue($result);
    }


    public function testWhereRouteV10(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/full/regexp/NAME1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testWhereRouteV11(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/simple/first/second/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:first|second';

        $this->assertTrue($result);
    }

    public function testWhereRouteV12(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/simple/1200/second/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:1200|second';

        $this->assertTrue($result);
    }

    public function testWhereRouteV13(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/simple/first/1200/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testWhereRouteV14(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/where/simple/first/CUPSLOCK';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }
}