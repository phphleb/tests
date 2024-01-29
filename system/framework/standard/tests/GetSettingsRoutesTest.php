<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы $this->settings() в контроллерах.
 */
class GetSettingsRoutesTest extends TestCase
{
    private const DEFAULT_DATA = [
        'settings.getParam.common' => 'info',
        'settings.getParam.database' => 'test',
        'settings.getParam.main' => true,
        'settings.getParam.system' => 'Test',
        'settings.getPath1' => true,
        'settings.getPath2' => true,
        'settings.getIsCliMode' => false,
        'settings.getIsAsyncMode' => false,
        'settings.getIsDebug' => false,
        'settings.isStandardMode' => true,
        'settings.getModuleName' => null,
        'settings.getRealPath' => true,
        'settings.getIsEndingUrl' => false,
    ];

    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testGetSettingsRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-settings/controller/get';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $this->assertArrayEquals($commandResult, self::DEFAULT_DATA);
    }

    public function testGetSettingsRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-settings-static/controller/get';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $this->assertArrayEquals($commandResult, self::DEFAULT_DATA);
    }

}