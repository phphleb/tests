<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы модулей.
 */
class ModuleParamsTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    /**
     * Базовая работа модуля c определением класса в виде строки.
     */
    public function testModuleTemplateV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module/base-template/1';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'MODULE-EXAMPLE-TEST-TEMPLATE';

        $this->assertTrue($result);
    }

    /**
     * Базовая работа модуля c определением класса в виде класса.
     */
    public function testModuleTemplateV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module/base-template/2';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'MODULE-EXAMPLE-TEST-TEMPLATE';

        $this->assertTrue($result);
    }

    /**
     * Базовая работа модуля вместе с определением в виде класса и метода.
     */
    public function testModuleTemplateV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module/base-template/3';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'MODULE-EXAMPLE-TEST-SECTION-TEMPLATE';

        $this->assertTrue($result);
    }

    /**
     * Базовая работа модуля с учётом подстановки параметра в метод.
     */
    public function testModuleTemplateV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module/base-template/verbs';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'MODULE-VERBS-SUCCESS';

        $this->assertTrue($result);
    }

    /**
     * Базовая работа модуля с динамическим маршрутом.
     */
    public function testModuleTemplateV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module/base-template/dynamic/template';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'MODULE-TEMPLATE-SUCCESS';

        $this->assertTrue($result);
    }

    /**
     * Базовая работа модуля со сложным динамическим маршрутом.
     */
    public function testModuleTemplateV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module/named/name/module';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'MODULE-CHECK-NAMED-CONTROLLER-SUCCESS';

        $this->assertTrue($result);
    }

    /**
     * Базовая работа модуля с динамическим маршрутом.
     */
    public function testModuleParams(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;
        $config['database']['db.settings.list'] = [
            'sqlite.name1' => [
                'sqlite:c:/1/test.db',
                'user' => 'username-test',
                'pass' => 'password',
                'test' => 1,
            ],
            'sqlite.name3' => [
                'sqlite:c:/3/main.db',
                'user' => 'username',
                'pass' => 'password',
            ],
        ];
        $target = [
            'database.type' => 'sqlite.name2', // Переопределено в модуле.
            'database.data' => [
                'sqlite.name1' => [ // Переопределено в модуле.
                    'sqlite:c:/1/main.db',
                    'user' => 'username',
                    'pass' => 'password',
                ],
                'sqlite.name2' => [ // Добавлено в модуле.
                    'sqlite:c:/2/main.db',
                    'user' => 'username',
                    'pass' => 'password',
                ],
                'sqlite.name3' => [
                    'sqlite:c:/3/main.db',
                    'user' => 'username',
                    'pass' => 'password',
                ],
            ],
            'main.session.enabled' => false, // Переопределено в модуле.
            'main.db.log.enabled' => false,
            'main.test.value' => 100500, // Добавлено в модуле.
        ];
        $params['SERVER']['REQUEST_URI'] = '/test-module/base-params/check-params';
        $commandResult = $this->framework->run($params, $config);
        $resultData = json_decode($commandResult, true);

        $this->assertArrayEquals($resultData, $target);
    }

    public function testModuleFirstGroupV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module/group/first/controller';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '_FIRST-GROUP-TEMPLATE_first-group';

        $this->assertTrue($result);
    }

    public function testModuleSecondGroupV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module/group/second/middleware';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SECOND_GROUP_MIDDLEWARE__SECOND-GROUP-TEMPLATE_';

        $this->assertTrue($result);
    }

    public function testModuleLevel3ControllerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-module/group/level3/first/controller';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === '_FIRST-GROUP-LEVEL3-TEMPLATE_in-group3';

        $this->assertTrue($result);
    }

    public function testModuleLevel3MiddlewareV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = 'test-module/group/level3/second/middleware';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'SECOND_GROUP_LEVEL3-MIDDLEWARE__SECOND-GROUP-LEVEL3-TEMPLATE_';

        $this->assertTrue($result);
    }
}