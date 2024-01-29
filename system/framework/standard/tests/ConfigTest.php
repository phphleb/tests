<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование конфигурации фреймворка.
 */
class ConfigTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testIndexPageV1(): void
    {   
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-config/custom/value';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = false;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'custom_param_value');
    }

}