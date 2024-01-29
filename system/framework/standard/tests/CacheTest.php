<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Static\Settings;
use Phphleb\TestO\TestCase;

/**
 * Проверка кеширования.
 */
class CacheTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testSingleCache(): void
    {
        $params = $this->framework::DEFAULT_DATA;

        $params['SERVER']['REQUEST_URI'] = '/test-cache/controller/clear';
        $setResult = $this->framework->run($params);

        $params['SERVER']['REQUEST_URI'] = '/test-cache/controller/set';
        $setResult = $this->framework->run($params);

        $this->assertTrue((bool)$setResult);

        $params['SERVER']['REQUEST_URI'] = '/test-cache/controller/get';
        $getResult = $this->framework->run($params);
        $this->assertTrue($getResult && $getResult === $setResult);

        $params['SERVER']['REQUEST_URI'] = '/test-cache/controller/expire';
        $expireResult = $this->framework->run($params);
        $this->assertTrue((bool)$expireResult);

        $params['SERVER']['REQUEST_URI'] = '/test-cache/controller/delete';
        $this->framework->run($params);

        $params['SERVER']['REQUEST_URI'] = '/test-cache/controller/expire';
        $expireResult = $this->framework->run($params);
        $this->assertFalse((bool)$expireResult);

        $params['SERVER']['REQUEST_URI'] = '/test-cache/controller/get';
        $getResult = $this->framework->run($params);
        $this->assertFalse((bool)$getResult);

        $params['SERVER']['REQUEST_URI'] = '/test-cache/controller/clear';
        $this->framework->run($params);
    }
}