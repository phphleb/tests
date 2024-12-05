<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Базовая проверка групп.
 */
class PreviewRoutesTest extends TestCase
{
    private const TEXT_PATH = '/test-route-preview/text/';

    private const TEXT_ROUTE = 'test-route-preview/text/{name}/{value?}';

    private const JSON_PATH = '/test-route-preview/json/';

    private const JSON_ROUTE = 'test-route-preview/json/{name}/{value?}';

    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testRouteTextPreviewV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $name = 'Test';
        $value = 10;
        $method = 'GET';
        $address = self::TEXT_ROUTE;

        $params['SERVER']['REQUEST_URI'] = self::TEXT_PATH . "$name/$value";
        $params['SERVER']['REQUEST_METHOD'] = $method;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === "ROUTE:{$address}_PARAM[NAME]:{$name}_PARAM[VALUE]:{$value}_METHOD:{$method}";

        $this->assertTrue($result);
    }

    public function testRouteTextPreviewV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $name = 'Test';
        $value = null;
        $method = 'POST';
        $address = self::TEXT_ROUTE;

        $params['SERVER']['REQUEST_URI'] = self::TEXT_PATH . "$name/$value";
        $params['SERVER']['REQUEST_METHOD'] = $method;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === "ROUTE:{$address}_PARAM[NAME]:{$name}_PARAM[VALUE]:{$value}_METHOD:{$method}";

        $this->assertTrue($result);
    }

    public function testRouteTextPreviewV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $name = 1;
        $value = 0;
        $method = 'PUT';
        $address = self::TEXT_ROUTE;

        $params['SERVER']['REQUEST_URI'] = self::TEXT_PATH . "$name/$value";
        $params['SERVER']['REQUEST_METHOD'] = $method;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === "ROUTE:{$address}_PARAM[NAME]:{$name}_PARAM[VALUE]:{$value}_METHOD:{$method}";

        $this->assertTrue($result);
    }

    public function testRouteJsonPreviewV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $name = 'Test';
        $value = 's10';
        $method = 'GET';
        $target = ['route' => self::JSON_ROUTE, 'name' => $name, 'value' => $value, 'method' => $method];

        $params['SERVER']['REQUEST_URI'] = self::JSON_PATH . "$name/$value";
        $params['SERVER']['REQUEST_METHOD'] = $method;
        $commandResult = $this->framework->run($params);

        $this->assertArrayEquals(json_decode($commandResult, true), $target);
    }

    public function testRouteJsonPreviewV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $name = 'Test';
        $value = '';
        $method = 'GET';
        $target = ['route' => self::JSON_ROUTE, 'name' => $name, 'value' => '', 'method' => $method];

        $params['SERVER']['REQUEST_URI'] = self::JSON_PATH . "$name/$value";
        $params['SERVER']['REQUEST_METHOD'] = $method;
        $commandResult = $this->framework->run($params);

        $this->assertArrayEquals(json_decode($commandResult, true), $target);
    }
}
