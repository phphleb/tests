<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы аттрибутов фреймворка.
 */
class AttributeTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testTaskDisableAttributeOff(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-attribute/controller/disable/off';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'TEST-ATTRIBUTE-TASK#1');
    }

    public function testTaskDisableAttributeOn(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-attribute/controller/disable/on';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === '#1');
    }

    public function testTaskPurposeFullAttribute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-attribute/controller/purpose/full';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'TEST-ATTRIBUTE-TASK#1');
    }

    public function testTaskPurposeExternalAttribute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-attribute/controller/purpose/external';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === 'TEST-ATTRIBUTE-TASK#1');
    }

    public function testTaskPurposeConsoleAttribute(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-attribute/controller/purpose/console';
        $commandResult = $this->framework->run($params);

        $result = str_starts_with(trim($commandResult), 'ERROR');

        $this->assertTrue($result);
    }
}