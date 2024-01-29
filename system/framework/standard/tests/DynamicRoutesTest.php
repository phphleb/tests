<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Базовая проверка работы динамического маршрутов.
 */
class DynamicRoutesTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    /**
     * Проверка простого динамического маршрута.
     */
    public function testDynamicRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/test/variable1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '{"first":"variable1"}';

        $this->assertTrue($result);
    }

    /**
     * Проверка простого динамического маршрута с 0.
     */
    public function testDynamicRouteToZeroValue(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/test/0';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '{"first":"0"}';

        $this->assertTrue($result);
    }
    
    /** 
     * Проверка динамического маршрута с отображением в шаблоне. 
     */
    public function testDynamicRouteWithView(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/test/variable1/view';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:variable1';
        
        $this->assertTrue($result);
    }

    /**
     * Проверка многосоставного динамического маршрута с отображением в шаблоне.
     */
    public function testComplexDynamicRouteWithView(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/test/variable1/variable2/variable3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:variable1|variable2|variable3';

        $this->assertTrue($result);
    }

    /**
     * Проверка многосоставного маршрута c переданной необязательной конечной частью.
     */
    public function testVariableFullDynamicRouteWithView(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/inexact/variable1/variable2/variable3';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:variable1|variable2|variable3';

        $this->assertTrue($result);
    }

    /**
     * Проверка многосоставного маршрута c не переданной необязательной конечной частью.
     */
    public function testVariableDynamicRouteWithView(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/dinamic/inexact/variable1/variable2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:variable1|variable2';

        $this->assertTrue($result);
    }

}