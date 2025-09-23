<?php

declare(strict_types=1);

namespace Phphleb\Tests;


use Phphleb\TestO\TestCase;

/**
 * Проверка работы при минимальной конфигурации.
 */
class MinimalConfigTest extends TestCase
{
    protected const DEFAULT_INDEX_CONFIG = [
            'common' => [
                'debug' => false,
                'log.enabled' => false,
                'max.log.level' => 'info',
                'routes.auto-update' => false,
                'app.cache.on' => false,
            ],
    ];

    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testMinHealthCheck(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = self::DEFAULT_INDEX_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/';
        $config['common']['allowed.host'] = ['x.com', 'site.com'];
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'INDEX');
    }
}
