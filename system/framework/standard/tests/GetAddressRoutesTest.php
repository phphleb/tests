<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы $this->route() в контроллерах.
 */
class GetAddressRoutesTest extends TestCase
{
    private const DEFAULT_DATA = [
        'name' => 'test-address.name',
        'address' => 'http://' . 'site.com/dinamic-check-address/where/1200/second',
        'url' => '/dinamic-check-address/where/1200/second',
    ];

    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testGetAddressRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-address/controller/1200/second';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $this->assertArrayEquals($commandResult, self::DEFAULT_DATA);
    }

    public function testGetAddressRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-address/controller/1200/second';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $this->assertArrayEquals($commandResult, self::DEFAULT_DATA);
    }

    public function testGetAddressRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-address/controller/1200/second';
        $params['SERVER']['REQUEST_METHOD'] = 'PUT';
        $commandResult = $this->framework->run($params);
        $result = str_starts_with($commandResult, 'ERROR: ');

        $this->assertTrue($result);
    }

}