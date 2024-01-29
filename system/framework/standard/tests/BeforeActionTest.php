<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы метода beforeAction.
 */
class BeforeActionTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testBeforeActionControllerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-before-action/controller';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $result = $commandResult === 'ERROR';

        $this->assertFalse($result);
    }

    public function testControllerMethodNameV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-controller-method-name/controller';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'methodNameSuccess';

        $this->assertTrue($result);
    }

    public function testControllerMethodNameV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-controller-method-name/controller/container';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'methodNameFromContainerSuccess';

        $this->assertTrue($result);
    }
}