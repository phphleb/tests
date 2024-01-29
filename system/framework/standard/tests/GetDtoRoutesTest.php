<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы $this->container->dto() в контроллерах.
 */
class GetDtoRoutesTest extends TestCase
{

    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testGetAddressRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-dto/controller/get';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $data = [
           'data' => [
               'App\Middlewares\DtoMiddleware',
               'App\Middlewares\DtoMiddleware'
           ],
            'list' => [
                'test' => [
                    'App\Middlewares\DtoMiddleware',
                    'App\Middlewares\DtoMiddleware'
                ],
                'simple' => 'TEST-DTO-VALUE',
            ],
            'list-after-clear' => [],
        ];

        $this->assertArrayEquals($commandResult, $data);
    }

}