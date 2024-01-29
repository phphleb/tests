<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка не динамических маршрутов с непостоянной конечной частью.
 */
class EndingRoutesTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    /**
     * Проверка отображения шаблона из маршрута c заполненной непостоянной конечной частью.
     */
    public function testViewEndFullPartInRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/views/test/template/end/part';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VIEW-BASE-TEMPLATE';

        $this->assertTrue($result);
    }

    /**
     * Проверка отображения шаблона из маршрута c не заполненной непостоянной конечной частью.
     */
    public function testViewEndPartInRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/views/test/template/end';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VIEW-BASE-TEMPLATE';

        $this->assertTrue($result);
    }

    public function testEndingRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-test-ending/success/first/second/end';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'ENDING-SUCCESS';

        $this->assertTrue($result);
    }

    public function testEndingRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-test-ending/success/first/second';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'ENDING-SUCCESS';

        $this->assertTrue($result);
    }

    public function testEndingRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-test-ending/controller/first/second/end';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'CONTROLLER-ENDING-SUCCESS';

        $this->assertTrue($result);
    }

    public function testEndingRouteV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-test-ending/controller/first/second';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'CONTROLLER-ENDING-SUCCESS';

        $this->assertTrue($result);
    }

    public function testEndingRouteV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-test-ending-name/controller/first/second/end';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'CONTROLLER-ENDING-NAME';

        $this->assertTrue($result);
    }

    public function testEndingRouteV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-test-ending-name/controller/first/second';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'CONTROLLER-ENDING-NAME';

        $this->assertTrue($result);
    }
}