<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка на рабочий список разрешенных доменов.
 */
class AllowHostsTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testValidSimpleAllowedHostV1(): void
    {   
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['common']['allowed.host'] = ['x.com', 'site.com'];
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'INDEX');
    }

    public function testInvalidSimpleAllowedHostV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['common']['allowed.host'] = ['site2.com'];
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertFalse($commandResult !== 'INDEX');
    }

    public function testValidAllowedHostV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['common']['allowed.host'] = ['x.com', '/^(.*\.)?site\.com$/', 'y.com'];
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'INDEX');
    }
}
