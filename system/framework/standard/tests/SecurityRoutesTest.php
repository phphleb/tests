<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Базовая проверка работы маршрутов.
 */
class SecurityRoutesTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testHandleRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-handle-dangerous-symbols/all';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  === "D\'ARTAGNAN";

        $this->assertTrue($result);
    }
}