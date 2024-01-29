<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка защиты маршрутов.
 */
class ProtectRoutesTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testProtectRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-protect/get-method';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['POST']['_token'] = 'invalid-key';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && str_contains($commandResult, 'CSRF');        

        $this->assertTrue($result);
    }

    public function testProtectGroupRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-protect/get-group';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['POST']['_token'] = 'invalid-key';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && str_contains($commandResult, 'CSRF');

        $this->assertTrue($result);
    }
   
}