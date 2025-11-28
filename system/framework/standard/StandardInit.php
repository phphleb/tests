<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Constructor\Data\SystemSettings;
use Hleb\HlebBootstrap;

class StandardInit
{
    public const FALLBACK = '404.NOT_FOUND_FALLBACK-';

    protected string $initiator = 'init.php';

    public const DEFAULT_DATA = [
        'SERVER' => [
            'HTTP_HOST' => 'site.com',
            'REQUEST_URI' => '/test/',
            'REQUEST_METHOD' => 'GET',
        ],
        'POST' => [],
        'GET' => [],
        'COOKIE' => [],
        'SESSION' => [
            'PHPSESSID' => 'test1'
        ]
    ];

    public const DEFAULT_CONFIG = [
        'common' => [
            'debug' => false,
            'max.log.level' => 'info',
            'log.level.in-cli' => false,
            'timezone' => 'Europe/Moscow',
            'test' => 'test_value',  // Неизменяемое значение для тестов.
            'routes.auto-update' => true,
            'container.mock.allowed' => true,
            'log.enabled' => false,
            'error.reporting' => E_ALL,
            'log.sort' => false,
            'log.stream' => false,
            'log.format' => 'row',
            'log.db.excess' => 0,
            'app.cache.on' => true,
            'twig.options' => [],
            'twig.cache.inverted' => [],
            'show.request.id' => true,
            'max.cli.log.level' => 'info',
            'max.log.size' => 0,
            'max.cache.size' => 200,
        ],
        'database' => ['base.db.type' => 'test', 'db.settings.list' => [],],
        'main' => [
            'session.enabled' => true,
            'db.log.enabled' => false,
            'default.lang' => 'en',
            'allowed.languages' => ['en', 'ru'],
            'session.options' => [],
        ],
        'system' => [
            'classes.autoload' => true,
            'project.paths' => [],
            'ending.url.methods' => ['get'],
            'origin.request' => false,
            'url.validation' => false,
            'ending.slash.url' => false,
            'session.name' => 'Test',
            'page.external.access' => false,
            'module.dir.name' => 'modules',
            'custom.setting.files' => [],
            'custom.function.files' => [],
            'module.namespace' => 'Modules',
            'max.session.lifetime' => 1000,
            'allowed.route.paths' => [],
            'allowed.structure.parts' => [],

        ],
        'path' => [
            'global' => self::GLOBAL_DIR,
            'public' => self::PUBLIC_DIR,
            'vendor' => self::VENDOR_DIR,
            'modules' => self::MODULE_DIR,
            'app' => self::GLOBAL_DIR . '/app',
            'storage' => self::GLOBAL_DIR . '/storage',
            'routes' => self::GLOBAL_DIR . '/routes',
            'resources' => self::GLOBAL_DIR . '/resources',
            'views' => self::GLOBAL_DIR . '/resources/views',
            'library' => self::VENDOR_DIR . '/phphleb',
            'framework' => self::VENDOR_DIR . '/phphleb/framework',
        ],
        'custom' => [
            'param' => 'custom_param_value',
        ]
    ];

    private const PUBLIC_DIR = __DIR__ . '/directories/public';
    private const VENDOR_DIR = __DIR__ . '/../../../../../../vendor';
    private const GLOBAL_DIR = __DIR__ . '/directories';
    private const MODULE_DIR = __DIR__ . '/directories/modules';

    private bool $status = true;

    public function run(array $params = [], array $config = [])
    {
        $params = array_merge(self::DEFAULT_DATA, $params);
        $config = array_merge(self::DEFAULT_CONFIG, $config);
        /** @see SystemSettings::setData() */
        $config['default'] = $config['common'];
        $data = base64_encode($this->getNormalizedJsonData($params));
        $configData = base64_encode($this->getNormalizedJsonData($config));

        $dir = __DIR__;
        ob_start();
        passthru("php $dir/{$this->initiator} $data $configData", $resultCode);
        $this->status = $resultCode === 0;

        $output = ob_get_clean();

        return (string)$output;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    private function getNormalizedJsonData(array $list): string
    {
        return json_encode($list);
    }

}