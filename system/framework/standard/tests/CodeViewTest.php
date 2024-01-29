<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы встроенных функций фреймворка.
 */
class CodeViewTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testViewFuncV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-view-code/controller/200';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'TEST-VIEW-GET-200-SUCCESS';

        $this->assertTrue($result);
    }

    public function testViewFuncV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-view-code/controller/500';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'TEST-VIEW-POST-500-SUCCESS';

        $this->assertTrue($result);
    }

    public function testViewFuncV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-view-code/controller/403';
        $params['SERVER']['REQUEST_METHOD'] = 'PUT';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'TEST-VIEW-PUT-403-SUCCESS';

        $this->assertTrue($result);
    }

    public function testViewFuncV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-view-code/func/500';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'TEST-VIEW-FUNC-500-SUCCESS';

        $this->assertTrue($result);
    }

    public function testViewFuncV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-view-code/func/404';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'TEST-VIEW-FUNC-404-SUCCESS';

        $this->assertTrue($result);
    }

    public function testViewParts(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-view-code/controller/view';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'HEADER_CONTENT_100_FOOTER';

        $this->assertTrue($result);
    }
}