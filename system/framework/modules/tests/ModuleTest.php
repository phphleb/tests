<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

class ModuleTest extends TestCase
{
    private StandardModuleInit $framework;

    public function __construct()
    {
        if (!class_exists(StandardModuleInit::class, false)) {
            require __DIR__ . '/../StandardModuleInit.php';
        }

        $this->framework = new StandardModuleInit();
    }

    public function testModuleTemplateV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'PRODUCTS-MODULE-TEST-TEMPLATE';

        $this->assertTrue($result);
    }

    public function testModuleMiddlewareV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module-middleware';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'TEST-MIDDLEWARE-MODULE_products.test';

        $this->assertTrue($result);
    }

    public function testModuleDatabaseV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-database';
        $commandResult = $this->framework->run($params);
        $result = json_decode($commandResult, true);

        $list = [
            'base.db.type' => 'mysql.name',
            'base.redis.type' => 'MODULE-VALUE',
            'db.settings.list' => [
                'mysql.name' => [10],
                'new.name' => [40],
                'sqlite.name' => [30],
            ]
        ];

        $this->assertArrayEquals($result, $list);
    }
}