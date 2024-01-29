<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование фреймворка на работоспособность и базовая проверка маршрутизатора.
 */
class BaseFrameworkTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testTaskCommand(): void
    {
        $commandResult = $this->framework->run();
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'SUCCESS');
    }

    public function testIndexPageV1(): void
    {   
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = false;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'INDEX');
    }    
    
    public function testIndexPageV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/?test';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = false;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'INDEX');
    }

    public function testIndexPageV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 0;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'INDEX');
    }

    public function testIndexPageV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/?test';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 0;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'INDEX');
    }

    public function testIndexPageV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 1;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'INDEX');
    }

    public function testIndexPageV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/?test';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 1;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'INDEX');
    }

    public function testDoubtfulPageV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/0';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = false;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'RIGHT_WAY');
    }

    public function testDoubtfulPageV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/0';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 0;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'RIGHT_WAY');
    }

    public function testDoubtfulPageV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/0/';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 1;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'RIGHT_WAY');
    }

    public function testDoubtfulPageV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/0/';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = false;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'RIGHT_WAY');
    }

    public function testDoubtfulPageV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/0/?test';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = false;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'RIGHT_WAY');
    }

    public function testDoubtfulPageV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/0/?test';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 1;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'RIGHT_WAY');
    }

    public function testDoubtfulPageV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/0?test';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 0;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();

        $this->assertTrue($status && $commandResult === 'RIGHT_WAY');
    }

    public function testDoubtfulPageV8(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/0';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 1;
        $commandResult = $this->framework->run($params, $config);

        $this->assertFalse($commandResult === 'RIGHT_WAY');
    }

    public function testDoubtfulPageV9(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/0/';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 0;
        $commandResult = $this->framework->run($params, $config);

        $this->assertFalse($commandResult === 'RIGHT_WAY');
    }

    public function testDoubtfulPageV10(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '//0///';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['system']['ending.slash.url'] = 1;
        $commandResult = $this->framework->run($params, $config);

        $this->assertFalse($commandResult === 'RIGHT_WAY');
    }
}