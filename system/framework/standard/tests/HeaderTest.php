<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка кеширования.
 */
class HeaderTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new HeaderInit();
    }

    public function testHeaderAndStatusV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $params['SERVER']['REQUEST_URI'] = '/header-controller/status200';
        $result = json_decode($this->framework->run($params), true);
        $origin = [
            'headers' => [],
            'code' => 200,
        ];

        $this->assertArrayEquals($origin, (array)$result);
    }

    public function testHeaderAndStatusV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $params['SERVER']['REQUEST_URI'] = '/header-controller/status419v1';
        $result = json_decode($this->framework->run($params), true);
        $origin = [
            'headers' => [],
            'code' => 419,
        ];

        $this->assertArrayEquals($origin, (array)$result);
    }

    public function testResponseStatusV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $params['SERVER']['REQUEST_URI'] = '/header-controller/status419response1';
        $result = json_decode($this->framework->run($params), true);
        $origin = [
            'headers' => [],
            'code' => 419,
        ];

        $this->assertArrayEquals($origin, (array)$result);
    }

    public function testResponseStatusV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $params['SERVER']['REQUEST_URI'] = '/header-controller/status419response2';
        $result = json_decode($this->framework->run($params), true);
        $origin = [
            'headers' => [],
            'code' => 500,
        ];

        $this->assertArrayEquals($origin, (array)$result);
    }
}