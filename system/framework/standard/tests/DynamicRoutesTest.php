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

    /**
     * Проверка маршрута одновременно с динамической частью и нединамическим необязательным окончанием.
     */
    public function testEndingEmptyByDynamicRoute1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-ending-empty/variable1/end';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'TEST-ENDING-EMPTY';

        $this->assertTrue($result);
    }

    /**
     * Проверка маршрута одновременно с динамической частью и нединамическим необязательным окончанием.
     */
    public function testEndingEmptyByDynamicRoute2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-ending-empty/variable1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'TEST-ENDING-EMPTY';

        $this->assertTrue($result);
    }


    /**
     * Проверка динамических параметров с заданными значениями по умолчанию.
     */
    public function testDynamicDefaultsRoute1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-defaults-1/variable1/two/three';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:variable1|two|three';

        $this->assertTrue($result);
    }

    /**
     * Проверка динамических параметров с заданными значениями по умолчанию.
     */
    public function testDynamicDefaultsRoute2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-defaults-1/variable1/undefined/three';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:variable1|two|three';

        $this->assertFalse($result);
    }

    /**
     * Проверка динамических параметров с заданными значениями по умолчанию.
     */
    public function testDynamicDefaultsRoute3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-defaults-1/variable1/two/three';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:variable1|two|three';

        $this->assertTrue($result);
    }

    /**
     * Проверка динамических параметров с заданными значениями по умолчанию.
     */
    public function testDynamicDefaultsRoute4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-defaults-2/variable1/two/three';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:variable1|two|three';

        $this->assertTrue($result);
    }

    /**
     * Проверка динамических параметров с заданными значениями по умолчанию.
     */
    public function testDynamicDefaultsRoute5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-defaults-2/variable1/two';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DATA:variable1|two';

        $this->assertTrue($result);
    }

}
