<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

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
        $params['SERVER']['REQUEST_URI'] = '/test-config?p=1';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'products.test';

        $this->assertTrue($result);
    }

    public function testModuleConfigV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-config?p=main';
        $params['GET']['p'] = 'main';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'replace_var';

        $this->assertTrue($result);
    }

    public function testModuleConfigV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-config?p=custom';
        $params['GET']['p'] = 'custom';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'replace_var/replace_var/100/str101';

        $this->assertTrue($result);
    }

    public function testModuleConfigV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-config?p=override';
        $params['GET']['p'] = 'override';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'replace_in_module_replace_var';

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