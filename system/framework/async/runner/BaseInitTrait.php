<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Constructor\Data\SystemSettings;
use Phphleb\Tests\AsyncLogger\AsyncLoggerTestException;

trait BaseInitTrait
{
    public const FALLBACK = '404.NOT_FOUND_FALLBACK-';
    
    public const SESSION_ID = 'PHPSESSID';

    public const SESSION_KEY = '2132990220a9e4ec7d7a31c090ba78ab';

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
            'app.cache.on' => false,
            'twig.options' => [],
            'twig.cache.inverted' => [],
            'show.request.id' => true,
            'max.cli.log.level' => 'info',
            'max.log.size' => 0,
            'max.cache.size' => 0,
        ],
        'database' => ['base.db.type' => 'test', 'db.settings.list' => [], ],
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
            'session.name' => self::SESSION_ID,
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
            'global'    => self::GLOBAL_DIR,
            'public'    => self::PUBLIC_DIR,
            'vendor'    => self::VENDOR_DIR,
            'modules'   => self::MODULE_DIR,
            'app'       => self::GLOBAL_DIR . '/app',
            'storage'   => self::GLOBAL_DIR . '/storage',
            'routes'    => self::GLOBAL_DIR . '/routes',
            'resources' => self::GLOBAL_DIR . '/resources',
            'views'     => self::GLOBAL_DIR . '/resources/views',
            'library'   => self::VENDOR_DIR . '/phphleb',
            'framework' => self::VENDOR_DIR . '/phphleb/framework',
    ],
    ];

    protected const PUBLIC_DIR = __DIR__ . '/directories/public';
    protected const VENDOR_DIR = __DIR__ . '/../../../../../../../vendor';
    protected const GLOBAL_DIR = __DIR__ . '/directories';
    protected const MODULE_DIR = __DIR__ . '/directories/modules';

    protected bool $status = true;

    protected array $config;

    /**
     * Нужно создать новый экземпляр класса, чтобы установить новую конфигурацию.
     */
    public function __construct(array $config = [])
    {
        if (!is_dir(self::VENDOR_DIR . '/phphleb/framework')) {
            throw new \ErrorException('Sorry, testing can only be done if the libraries are in the `vendor` folder.');
        }

        $this->config = array_merge(self::DEFAULT_CONFIG, $config);

        /** @see SystemSettings::setData() */
        $this->config['default'] = $this->config['common'];
    }

    /**
     * Выполнение следующего цикла с тем-же экземпляром фреймворка.
     *
     * @param array $paramList - представляет собой список массивов для циклических запросов.
     */
    public function run(array $paramList = []): string
    {
        foreach ($paramList as $key => $params) {
            $paramList[$key] = array_merge($this->getData(), $params);
        }
        $paramList or $paramList = [$this->getData()];

        $data = $this->getNormalizedJsonData($paramList);
        $configData = $this->getNormalizedJsonData($this->config);

        $dir = __DIR__;
        ob_start();
        passthru("php $dir/init.php $data $configData", $resultCode);
        $this->status = $resultCode === 0;

        $output = ob_get_clean();

        return (string)$output;
    }

    public function handler(string $response, string $cellName): array
    {
        $result = [];
        $content = (array)json_decode($response, true);
        foreach ($content as $query) {
            $result[] = $query[$cellName];
        }
        return $result;
    }

    public function checkErrors(string $response): void
    {
        $errors = array_filter($this->handler($response, 'error'));

        if ($errors) {
            throw new AsyncLoggerTestException(implode(PHP_EOL, $errors));
        }
    }

    public function getRepeatVal(string $value, int $count)
    {
        $list = [];
        for ($i = 0; $i < $count; $i++) {
            $list[] = $value;
        }
        return implode('|', $list);
    }

    public function checkCode200($response)
    {
        return '200' === implode(array_unique($this->handler($response, 'status')));
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    protected function getNormalizedJsonData(array $list): string
    {
        return str_replace('"', '\"', json_encode($list));
    }
}