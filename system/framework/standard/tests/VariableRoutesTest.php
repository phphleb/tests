<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка вариативных маршрутов по условиям.
 */
class VariableRoutesTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testVariableRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE=0-3,5';

        $this->assertTrue($result);
    }

    public function testVariableRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable/p1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE=0-3,5';

        $this->assertTrue($result);
    }

    public function testVariableRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable/p1/p2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE=0-3,5';

        $this->assertTrue($result);
    }

    public function testVariableRouteV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable/p1/p2/p3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE=0-3,5';

        $this->assertTrue($result);
    }

    public function testVariableRouteV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable/p1/p2/p3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE=0-3,5';

        $this->assertTrue($result);
    }

    public function testVariableRouteV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable/p1/p2/p3/p4';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testVariableRouteV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable/p1/p2/p3/p4/p5';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE=0-3,5';

        $this->assertTrue($result);
    }

    public function testVariableRouteV8(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable/p1/p2/p3/p4/p5/p6';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testVariableRouteV9(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-require/level';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testVariableRouteV10(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-require/level/p1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE-REQUIRE=1,3-5,7';

        $this->assertTrue($result);
    }

    public function testVariableRouteV11(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-require/level/p1/p2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testVariableRouteV12(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-require/level/p1/p2/p3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE-REQUIRE=1,3-5,7';

        $this->assertTrue($result);
    }

    public function testVariableRouteV13(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-require/level/p1/p2/p3/p4';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE-REQUIRE=1,3-5,7';

        $this->assertTrue($result);
    }

    public function testVariableRouteV14(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-require/level/p1/p2/p3/p4/p5';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE-REQUIRE=1,3-5,7';

        $this->assertTrue($result);
    }

    public function testVariableRouteV15(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-require/level/p1/p2/p3/p4/p5/p6';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testVariableRouteV16(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-require/level/p1/p2/p3/p4/p5/p6/p7';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VARIABLE-REQUIRE=1,3-5,7';

        $this->assertTrue($result);
    }

    public function testVariableRouteV17(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-require/level/p1/p2/p3/p4/p5/p6/p7/p8';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testVariableRouteV18(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-data/raw/p1/p2/p3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === "[0:raw,1:p1,2:p2,3:p3]";

        $this->assertTrue($result);
    }

    public function testVariableRouteV19(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-data/object/p1/p2/p3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === "[0:object,1:p1,2:p2,3:p3]";

        $this->assertTrue($result);
    }

    public function testVariableRouteV20(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-data/container/p1/p2/p3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === "[0:container,1:p1,2:p2,3:p3]";

        $this->assertTrue($result);
    }

    public function testVariableRouteV21(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-variable-url/p0/p1/p2/p3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === "/test-variable-url/part1/part2";

        $this->assertTrue($result);
    }

}
