<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка использования PSR.
 */
class PsrTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testPsrLoggerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/psr/controller/logger/1';
        $commandResult = $this->framework->run($params);
        var_dump($commandResult);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'Phphleb\PsrAdapter\Psr3\Logger';

        $this->assertTrue($result);
    }

    public function testPsrLoggerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/psr/controller/logger/2';
        $commandResult = $this->framework->run($params);
        var_dump($commandResult);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'true';

        $this->assertTrue($result);
    }

    public function testPsrContainerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/psr/controller/container/1';
        $commandResult = $this->framework->run($params);
        var_dump($commandResult);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'Phphleb\PsrAdapter\Psr11\Container';

        $this->assertTrue($result);
    }

    public function testPsrContainerV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/psr/controller/container/2';
        $commandResult = $this->framework->run($params);
        var_dump($commandResult);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'true';

        $this->assertTrue($result);
    }

    public function testPsrContainerV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/psr/controller/container/3';
        $commandResult = $this->framework->run($params);
        var_dump($commandResult);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'true';

        $this->assertTrue($result);
    }

}