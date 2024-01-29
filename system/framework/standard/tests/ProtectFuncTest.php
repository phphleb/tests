<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы встроенных функций фреймворка.
 */
class ProtectFuncTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testDebugOffFunc(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-functions/controller/debug';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '0';

        $this->assertTrue($result);
    }

    public function testDebugOnFunc(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-functions/controller/debug';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['common']['debug'] = true;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '1';

        $this->assertTrue($result);
    }

    public function testConfigOnFunc(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-functions/controller/config';
        $params['SERVER']['REQUEST_METHOD'] = 'PUT';
        $config = $this->framework::DEFAULT_CONFIG;
        $config['common']['debug'] = true;
        $commandResult = $this->framework->run($params, $config);
        $status = $this->framework->getStatus();
        $result =  $commandResult === '1' && $status;

        $this->assertTrue($result);
    }

    public function testParamFunc(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-functions/controller/param';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result =  $commandResult === 'param' && $status;

        $this->assertTrue($result);
    }

    public function testCreateDirectoryFunc(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-functions/controller/create-directory';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result =  $commandResult === '@/app/Controllers/DefaultController.php' && $status;

        $this->assertTrue($result);
    }

}