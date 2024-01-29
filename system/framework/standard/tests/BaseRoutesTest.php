<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Базовая проверка работы маршрутов.
 */
class BaseRoutesTest extends TestCase
{
    private StandardInit $framework;

    private bool $hasRouteError = false;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testRouteErrors(): void
    {
        $commandResult = $this->framework->run();
        $status = $this->framework->getStatus();

        if (str_starts_with($commandResult, 'ERROR: HL')) {
            $this->hasRouteError = true;
            throw new \ErrorException($commandResult);
        }

        $this->assertTrue($status && $commandResult === 'SUCCESS');
    }

    /**
     * Циклический тест на проверку соответсвия различных параметров запроса и ответа.
     *
     * Проверяется:
     * 1) Соответствие HTTP-методу запроса, как правильному, так и не подходящему под маршрут.
     * 2) Правильное окончание URL согласно настройке фреймворка.
     * 3) Отсутсвие или присутствие окончания URL с GET-параметром.
     */
    public function testRoutePack(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;
        $types = ['GET', 'POST', 'DELETE', 'PUT', 'PATCH'];
        $rules = ['/' => 1, '' => 0, '/ ' => false, ' ' => false];
        $getParams = ['', '?test=1'];
        $errors = [];
        foreach ($types as $type) foreach ($rules as $slash => $rule) {
            $config['system']['ending.slash.url'] = $rule;
            foreach ($getParams as $param) {
                $slash = trim($slash);
                $params['SERVER']['REQUEST_URI'] = "/example/test{$slash}{$param}";
                foreach ($types as $method) {
                    $params['SERVER']['REQUEST_METHOD'] = $method;

                    $commandResult = $this->framework->run($params, $config);
                    $status = $this->framework->getStatus();
                    $result = $status && $commandResult === "EXAMPLE-$type";

                    if ($type === $method) {
                        if (!$result) {
                            $errors[] = "Test failed - query: $method {$param} (positive test)";
                        }
                        $this->assertTrue($result);
                    } else {
                        if ($result) {
                            $errors[] = "Test failed - query: $method {$param} (negative test)";
                        }
                        $this->assertFalse($result);
                    }
                }
            }
        }
        ($errors && !$this->hasRouteError) and throw new \Error(implode(PHP_EOL, $errors));
    }

    /**
     * Отдельная проверка маршрута options()
     */
    public function testOptionsRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example/test';
        $params['SERVER']['REQUEST_METHOD'] = 'OPTIONS';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'EXAMPLE-OPTIONS';

        $this->assertTrue($result);
    }

    /**
     * Проверка отображения шаблона из маршрута.
     */
    public function testViewInRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/views/test/template/';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VIEW-BASE-TEMPLATE';

        $this->assertTrue($result);
    }

    /**
     * Проверка отображения страницы 404 при неправильно заданном пути.
     */
    public function testViewInFallbackRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $types = ['GET', 'POST', 'DELETE', 'PUT', 'PATCH'];
        $params['SERVER']['REQUEST_URI'] = '/views/test/undefined-path/';
        foreach($types as $type) {
            $params['SERVER']['REQUEST_METHOD'] = $type;
            $commandResult = $this->framework->run($params);
            $status = $this->framework->getStatus();
            $result = $status && $commandResult === $this->framework::FALLBACK . $type;

            $this->assertTrue($result);
        }
    }

    /**
     * Проверка отображения вложенного шаблона с нестандартным названием из маршрута.
     */
    public function testNestedViewInRoute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/views/test/nested/template';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VIEW-NAME1-TEMPLATE';

        $this->assertTrue($result);
    }

    /**
     * Проверка отображения вложенного шаблона с указанным расширением.
     */
    public function testViewInRouteWithExtension(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/views/test/nested/template/extension';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VIEW-NAME1-TEMPLATE';

        $this->assertTrue($result);
    }

    /**
     * Проверка отображения шаблона через контроллер.
     */
    public function testViewInRouteInController(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example/test/controller/view';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'VIEW-BASE-TEMPLATE';

        $this->assertTrue($result);
    }

    /**
     * Проверка отображения JSON через контроллер.
     */
    public function testJsonFromController(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example/test/controller/json';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '{"name":"d\'Artagnan"}';

        $this->assertTrue($result);
    }

    /**
     * Проверка вставки контроллера в контроллер.
     */
    public function testControllerFromController(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example/test/controller/controller';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'INSERT-CONTROLLER-DATA';

        $this->assertTrue($result);
    }

    /**
     * Проверка внедрения маршрута из дополнительного файла /include/main.php
     */
    public function testIncludeMainRoutesDir(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test/include/main';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'INCLUDE-MAIN-MAP';

        $this->assertTrue($result);
    }
}