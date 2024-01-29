<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Базовая проверка групп.
 */
class GroupRoutesTest extends TestCase
{
    private const PR = '/test-group-prefix-1/prefix-2';

    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testRouteGroupV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-get-1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-1-GROUP-1';

        $this->assertTrue($result);
    }

    public function testRouteGroupV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-get-2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-2-GROUP-1';

        $this->assertTrue($result);
    }

    public function testRouteGroupV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-get-3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-3-GROUP-1';

        $this->assertTrue($result);
    }

    public function testRouteGroupV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-post-1';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-4-GROUP-1';

        $this->assertTrue($result);
    }

    public function testRouteGroupV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-2-prefix-3/group-get-1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-1-GROUP-1-2';

        $this->assertTrue($result);
    }

    public function testRouteGroupV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-2-prefix-3/group-get-2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-2-GROUP-1-2';

        $this->assertTrue($result);
    }

    public function testRouteGroupV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-2-prefix-3/group-post-3';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-3-GROUP-1-2';

        $this->assertTrue($result);
    }

    public function testRouteGroupV8(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-2-prefix-3/group-3-prefix-4/group-get-1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-1-GROUP-1-2-3';

        $this->assertTrue($result);
    }

    public function testRouteGroupV9(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-2-prefix-3/group-3-prefix-4/group-post-1';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-2-GROUP-1-2-3';

        $this->assertTrue($result);
    }

    public function testRouteGroupV10(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = self::PR . '/group-get-4';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'BASE-5-GROUP-1';

        $this->assertTrue($result);
    }

    public function testRouteGroupWhereMethodV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100/1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-TEXT-1';

        $this->assertTrue($result);
    }

    public function testRouteGroupWhereMethodV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100/2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-TEXT-2';

        $this->assertTrue($result);
    }

    public function testRouteGroupWhereMethodV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/str1/1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-TEXT-1';

        $this->assertFalse($result);
    }

    public function testRouteGroupWhereMethodV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/str2/2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-TEXT-2';

        $this->assertFalse($result);
    }

    public function testRouteGroupWhereMethodV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100/in/1002/1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-POSITION-1';

        $this->assertTrue($result);
    }

    public function testRouteGroupWhereMethodV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100/in/str/2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-NAME-2';

        $this->assertTrue($result);
    }

    public function testRouteGroupWhereMethodV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100/in/str2/1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-POSITION-1';

        $this->assertFalse($result);
    }

    public function testRouteGroupWhereMethodV8(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100/in/1000/2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-NAME-2';

        $this->assertFalse($result);
    }

    public function testRouteGroupWhereMethodV9(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100str/in/str/2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-NAME-2';

        $this->assertFalse($result);
    }

    public function testRouteGroupWhereMethodV10(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100/in/200/3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-POSITION-3';

        $this->assertTrue($result);
    }

    public function testRouteGroupWhereMethodV11(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100str/in/200/3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-POSITION-3';

        $this->assertFalse($result);
    }

    public function testRouteGroupWhereMethodV12(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-where-group/100/in/200str/3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-WHERE-GROUP-POSITION-3';

        $this->assertFalse($result);
    }
}