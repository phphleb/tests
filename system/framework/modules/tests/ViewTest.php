<?php

declare(strict_types=1);

namespace Phphleb\tests\system\framework\modules\tests;

use Phphleb\TestO\TestCase;
use Phphleb\Tests\StandardModuleInit;

class ViewTest extends TestCase
{
    private StandardModuleInit $framework;

    public function __construct()
    {
        if (!class_exists(StandardModuleInit::class, false)) {
            require __DIR__ . '/../StandardModuleInit.php';
        }

        $this->framework = new StandardModuleInit();
    }

    public function testModuleConfigV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-config';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'products.test';

        $this->assertTrue($result);
    }

    public function testModuleViewsV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-views';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'open_opened__TEST-VIEW-GLOBAL_';

        $this->assertTrue($result);
    }

    public function testModuleTemplateV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-template';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'NESTED-TEMPLATE_PRODUCTS-MODULE-TEST-TEMPLATE';

        $this->assertTrue($result);
    }
}