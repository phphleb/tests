<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Reference\SettingReference;
use Phphleb\TestO\TestCase;

/**
 * Проверка работы контейнеров фреймворка.
 */
class ContainerTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testRequestContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/request/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['type' => 'request', 'num' => 1];

        $this->assertArrayEquals($result, $data);
    }

    public function testRequestContainerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/request/2';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['type' => 'request', 'num' => 2];

        $this->assertArrayEquals($result, $data);
    }

    public function testRequestContainerV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/request/3';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['type' => 'request', 'num' => 3];

        $this->assertArrayEquals($result, $data);
    }

    public function testContainerCookiesV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/cookies/1';
        $params['COOKIE'] = [
            'test' => 1000,
            'PHP-SESSION-ID-TEST' => 'test-session'
        ];
        $params['SESSION'] = ['PHP-SESSION-ID-TEST'  => 'test-session'];
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $data = [
            'session-name' => 'PHP-SESSION-ID-TEST',
            'test-value' => '1000',
            'session-id' => 'test-session',
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testContainerCookiesV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/cookies/2';
        $params['COOKIE'] = [
            'test' => 1002,
            'PHP-SESSION-ID-TEST' => 'test-session'
        ];
        $params['SESSION'] = ['PHP-SESSION-ID-TEST'  => 'test-session'];
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $data = [
            'session-name' => 'PHP-SESSION-ID-TEST',
            'test-value' => '1002',
            'session-id' => 'test-session',
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testContainerCookiesV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/cookies/3';
        $params['COOKIE'] = [
            'test' => 1003,
            'PHP-SESSION-ID-TEST' => 'test-session'
        ];
        $params['SESSION'] = ['PHP-SESSION-ID-TEST'  => 'test-session'];
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $data = [
            'session-name' => 'PHP-SESSION-ID-TEST',
            'test-value' => '1003',
            'session-id' => 'test-session',
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testContainerRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/route/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $data = [
            'url' => '/test-route-name/controller',
            'name' => 'test.Container',
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testContainerRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/route/2';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $data = [
            'url' => '/test-route-name/controller',
            'name' => 'test.Container',
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testContainerRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/route/3';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $data = [
            'url' => '/test-route-name/controller',
            'name' => 'test.Container',
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testContainerResponseV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/response/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $data = [
            'status' => 100,
            'body' => 'BODY-TEST',
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testContainerResponseV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/response/2';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $data = [
            'status' => 1002,
            'body' => 'BODY-TEST',
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testContainerResponseV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/response/3';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $data = [
            'status' => 1003,
            'body' => 'BODY-TEST',
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testDtoContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/dto/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['value' => 1000];

        $this->assertArrayEquals($result, $data);
    }

    public function testDtoContainerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/dto/2';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['value' => 1002];

        $this->assertArrayEquals($result, $data);
    }

    public function testCacheContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/cache/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['empty_key' => false];

        $this->assertArrayEquals($result, $data);
    }

    public function testCacheContainerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/cache/2';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['empty_key' => false];

        $this->assertArrayEquals($result, $data);
    }

    public function testLogContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/log/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['empty_log' => null];

        $this->assertArrayEquals($result, $data);
    }

    public function testLogContainerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/log/2';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['empty_log' => null];

        $this->assertArrayEquals($result, $data);
    }

    public function testDbContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/db/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['has_method' => true];

        $this->assertArrayEquals($result, $data);
    }

    public function testDebugContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/debug/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = ['has_method' => true];

        $this->assertArrayEquals($result, $data);
    }

    public function testTemplateContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/template/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = [
            'settings' => [
                'settings.common.debug' => false,
                'settings.is_debug' => false,
            ],
            'request' => [
                'request.param.num' => 1,
                'request.get.param.type' => 'template',
            ],
            'log' => [
                'has' => true,
            ],
            'db' => [
                'has' => true,
            ],
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testModelContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/model/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = [
            'has.db' => true,
            'has.log' => true,
            'has.debug' => true,
            'has.request' => true,
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testModelContainerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/model/2';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = [
            'system.settings' => SettingReference::class,
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testTaskContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/task/1';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = [
            'has.db' => true,
            'has.debug' => true,
            'has.log' => true,
            'has.cache' => true,
            'has.settings' => true,
            'has.request' => true,
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testTaskContainerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/task/2';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = [
            'has.db' => true,
            'has.debug' => true,
            'has.log' => true,
            'has.cache' => true,
            'has.settings' => true,
            'has.request' => true,
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testTaskContainerV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/task/3';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);
        $data = [
            'has.db' => true,
            'has.debug' => true,
            'has.log' => true,
            'has.cache' => true,
            'has.settings' => true,
            'has.request' => true,
        ];

        $this->assertArrayEquals($result, $data);
    }

    public function testArrReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/arr/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testCacheReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/cache/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testCookieReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/cookie/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testCsrfReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/csrf/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testDbReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/db/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testDebugReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/debug/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testDtoReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/dto/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testLogReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/log/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testPathReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/path/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testRedirectReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/redirect/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testRequestReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/request/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testResponseReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/response/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testRouteReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/route/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testSessionReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/session/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testSettingReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/setting/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testSystemReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/system/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }

    public function testTemplateReductionContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/template/100';
        $result = $this->framework->run($params);

        $this->assertTrue($result === '1');
    }
}