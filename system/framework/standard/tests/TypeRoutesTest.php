<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка различных методов назначения маршрутов..
 */
class TypeRoutesTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testProtectRouteGet(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-route-types/get';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'ROUTE-GET';

        $this->assertTrue($result);
    }


    public function testProtectRouteAny(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $types = ['GET', 'POST', 'DELETE', 'PUT', 'PATCH'];
        $params['SERVER']['REQUEST_URI'] = '/test-route-types/any';
        foreach($types as $type) {
            $params['SERVER']['REQUEST_METHOD'] = $type;
            $commandResult = $this->framework->run($params);
            $status = $this->framework->getStatus();
            $result = $status && $commandResult === 'ROUTE-ANY';

            $this->assertTrue($result);
        }
    }

    public function testProtectRouteAnyOptions(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-route-types/any';
        $params['SERVER']['REQUEST_METHOD'] = 'OPTIONS';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '';

        $this->assertTrue($result);
    }

    public function testProtectRouteMatchV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-route-types/match';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'ROUTE-MATCH[GET,POST]';

        $this->assertTrue($result);
    }

    public function testProtectRouteMatchV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-route-types/match';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'ROUTE-MATCH[GET,POST]';

        $this->assertTrue($result);
    }

    public function testProtectRouteMatchV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-route-types/match';
        $params['SERVER']['REQUEST_METHOD'] = 'PATCH';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'PATCH';

        $this->assertTrue($result);
    }

    public function testProtectRouteMatchV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-route-types/match';
        $params['SERVER']['REQUEST_METHOD'] = 'PUT';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'ROUTE-MATCH[PUT,DELETE]';

        $this->assertTrue($result);
    }

    public function testProtectRouteMatchV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-route-types/match';
        $params['SERVER']['REQUEST_METHOD'] = 'DELETE';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'ROUTE-MATCH[PUT,DELETE]';

        $this->assertTrue($result);
    }

    public function testProtectRouteName(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-route-name/controller';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'Route-name';

        $this->assertTrue($result);
    }
   
}