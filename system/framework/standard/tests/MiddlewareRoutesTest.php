<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка middleware.
 */
class MiddlewareRoutesTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testMiddlewareV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-middleware/get-method';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'EXAMPLE-M8E-INDEX_SUCCESS-GET-TEXT';

        $this->assertTrue($result);
    }

    public function testMiddlewareV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-middleware-variable/get-method';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'EXAMPLE-M8E-INDEX_M8E-E5E_M8E-E5E_M8E-E5E_SUCCESS-GET-TEXT';

        $this->assertTrue($result);
    }

    public function testMiddlewareV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-middleware-variable/post-method';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'NESTED-M8E-INDEX_M8E-N4D_M8E-N4D_M8E-N4D_SUCCESS-POST-TEXT';

        $this->assertTrue($result);
    }

    public function testMiddlewareV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-middleware-group/get-method';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'NESTED-M8E-INDEX_M8E-N4D_M8E-N4D1_M8E-N4D2_SUCCESS-GET-TEXT';

        $this->assertTrue($result);
    }

    public function testMiddlewareV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-middleware-error/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '';

        $this->assertTrue($result);
    }

    public function testMiddlewareV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-middleware/data/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '1001_3.5_SUCCESS-GET-DATA';

        $this->assertTrue($result);
    }

    public function testMiddlewareV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-middleware/json/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '{"test":"data"}';

        $this->assertTrue($result);
    }

    public function testMiddlewareV8(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-middleware/integer/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '100500INTEGER-GET-DATA';

        $this->assertTrue($result);
    }

    public function testBeforeV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-before/get-method';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'EXAMPLE-M8E-INDEX_SUCCESS-GET-B-TEXT';

        $this->assertTrue($result);
    }

    public function testBeforeV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-before-group/get-method';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'NESTED-M8E-INDEX_M8E-N4D_M8E-N4D1_M8E-N4D2_SUCCESS-GET-B-TEXT';

        $this->assertTrue($result);
    }

    public function testAfterV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-after/get-method';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SUCCESS-GET-A-TEXT_EXAMPLE-M8E-INDEX';

        $this->assertTrue($result);
    }

    public function testAfterV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-after-group/get-method';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'NESTED-M8E-INDEX_SUCCESS-GET-A-TEXT_M8E-A1_M8E-A2_M8E-A1_M8E-A2';

        $this->assertTrue($result);
    }

}