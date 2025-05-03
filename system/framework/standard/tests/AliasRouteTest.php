<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы alias для маршрутов фреймворка.
 */
class AliasRouteTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testOriginUrlFromAlias(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/alias-origin-1';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'TEST-ALIAS-1');
    }

    public function testBaseAlias(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/alias-2';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'TEST-ALIAS-1');
    }

    public function testBaseAliasOtherMethod(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/alias-2';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);

        $this->assertFalse($commandResult === 'TEST-ALIAS-1');
    }

    public function testOriginUrlFromMiddlewareAlias(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/alias-origin-2/1';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'ALIAS-M8E_ALIAS-CONTROLLER-DATA');
    }

    public function testUrlFromMiddlewareAlias(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/prefix/alias-3/1';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'ALIAS-M8E_ALIAS-M8E_ALIAS-CONTROLLER-DATA');
    }

    public function testOriginUrlFromAliasAndData(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/alias-origin-2/2';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'ALIAS-M8E_DATA-2');
    }

    public function testUrlFromAliasAndData(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/prefix/alias-3/3';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'ALIAS-M8E_ALIAS-M8E_DATA-3');
    }

    public function testOriginUrlFromAliasAndCreateUrl(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/alias-origin-2/4';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'ALIAS-M8E_/alias-origin-2/4');
    }

    public function testAddressFromAliasAndCreateUrl(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/prefix/alias-3/5';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'ALIAS-M8E_ALIAS-M8E_/prefix/alias-3/5');
    }
}
