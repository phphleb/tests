<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка динамических маршрутов с подменяемыми частями в контроллере и методе.
 */
class ReplaceableRoutesTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    /**
     * Проверка базового совпадения с условиями.
     */
    public function testReplaceableRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic-where-replace/h2b-test/param/using/template/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:h2b-test|param|using';

        $this->assertTrue($result);
    }

    public function testReplaceableRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic-where-replace/method/template';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:template';

        $this->assertTrue($result);
    }

    public function testReplaceableRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic-where-replace/method/template';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:template';

        $this->assertTrue($result);
    }

    public function testReplaceableRouteV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic-where-replace/method/template';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:template';

        $this->assertTrue($result);
    }

    public function testReplaceableRouteV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic-where-replace/method/template';
        $params['SERVER']['REQUEST_METHOD'] = 'PUT';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'PUT';

        $this->assertTrue($result);
    }

    public function testReplaceableEmptyRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic-where-replace/method/not-template';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'POST';

        $this->assertTrue($result);
    }

    public function testReplaceableEmptyRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic-where-replace/method/template';
        $params['SERVER']['REQUEST_METHOD'] = 'DELETE';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'DELETE';

        $this->assertTrue($result);
    }

    public function testReplaceableRouteV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic-where-replace/method-once/template';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:template';

        $this->assertTrue($result);
    }

    public function testReplaceableRouteV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic-where-replace/method-controller/template';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:template';

        $this->assertTrue($result);
    }
}