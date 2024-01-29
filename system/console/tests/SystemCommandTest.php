<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование встроенных консольных команд фреймворка.
 *
 * Кроме проверки команд выясняется наличие подсказки к каждой команде.
 */
class SystemCommandTest extends TestCase
{
    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    public function testVersionCommand(): void
    {
        $result = $this->console->runCli('--version');

        $this->assertTrue((bool)$result);
    }       

    public function testVersionCommandHelp(): void
    {
        $commandResult = $this->console->runCli('--version', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testShortVersionCommand(): void
    {
        $result = $this->console->runCli('-v');

        $this->assertTrue((bool)$result);
    }

    public function testShortVersionCommandHelp(): void
    {
        $commandResult = $this->console->runCli('-v', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }         

    public function testInfoCommand(): void
    {
        $result = $this->console->runCli('--info');

        $this->assertTrue((bool)$result);
    }

    public function testInfoCommandHelp(): void
    {
        $commandResult = $this->console->runCli('--version', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testShortInfoCommand(): void
    {
        $result = $this->console->runCli('-i');

        $this->assertTrue((bool)$result);
    }

    public function testShortInfoCommandHelp(): void
    {
        $commandResult = $this->console->runCli('-i', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testInfoCommandArgument(): void
    {
        $commandResult = $this->console->runCli('--info', ['test']);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && trim($result) === 'test_value');
    }

    public function testShortInfoCommandArgument(): void
    {
        $commandResult = $this->console->runCli('-i', ['test']);
        $result = $this->console->getContent();

        $this->assertTrue($commandResult && trim($result) === 'test_value');
    }

    public function testHelpCommand(): void
    {
        $result = $this->console->runCli('--help');

        $this->assertTrue((bool)$result);
    }

    public function testHelpCommandHelp(): void
    {
        $commandResult = $this->console->runCli('--help', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testShortHelpCommand(): void
    {
        $result = $this->console->runCli('-h');

        $this->assertTrue((bool)$result);
    }

    public function testShortHelpCommandHelp(): void
    {
        $commandResult = $this->console->runCli('-h', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testLogsCommand(): void
    {
        $result = $this->console->runCli('--logs');

        $this->assertTrue((bool)$result);
    }

    public function testLogsCommandHelp(): void
    {
        $commandResult = $this->console->runCli('--logs', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testShortLogsCommand(): void
    {
        $result = $this->console->runCli('-lg');

        $this->assertTrue((bool)$result);
    }

    public function testShortLogsCommandHelp(): void
    {
        $commandResult = $this->console->runCli('-lg', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testRoutesCommand(): void
    {
        $result = $this->console->runCli('--routes');

        $this->assertTrue((bool)$result);
    }

    public function testUpdateRoutesCacheCommandV1(): void
    {
        $time = $this->console->getRouteCacheTimeData();

        $resultCommand = $this->console->runCli('--update-routes-cache');

        $result = $resultCommand && trim($this->console->getContent()) === 'The route cache has been successfully updated!';

        $this->console->updateRouteCacheTime($time);

        $this->assertTrue($result);
    }

    public function testUpdateRoutesCacheCommandV2(): void
    {
        $time = $this->console->getRouteCacheTimeData();

        $resultCommand = $this->console->runCli('--routes-upd');

        $this->console->updateRouteCacheTime($time);

        $result = $resultCommand && trim($this->console->getContent()) === 'The route cache has been successfully updated!';

        $this->assertTrue($result);
    }

    public function testUpdateRoutesCacheCommandV3(): void
    {
        $time = $this->console->getRouteCacheTimeData();

        $resultCommand = $this->console->runCli('-u');

        $this->console->updateRouteCacheTime($time);

        $result = $resultCommand && trim($this->console->getContent()) === 'The route cache has been successfully updated!';

        $this->assertTrue($result);
    }

    public function testRoutesCommandHelp(): void
    {
        $commandResult = $this->console->runCli('--routes', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testShortRoutesCommand(): void
    {
        $result = $this->console->runCli('-r');

        $this->assertTrue((bool)$result);
    }

    public function testShortRoutesCommandHelp(): void
    {
        $commandResult = $this->console->runCli('-r', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testListCommand(): void
    {
        $result = $this->console->runCli('--list');

        $this->assertTrue((bool)$result);
    }

    public function testListCommandHelp(): void
    {
        $commandResult = $this->console->runCli('--list', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testShortListCommand(): void
    {
        $result = $this->console->runCli('-l');

        $this->assertTrue((bool)$result);
    }

    public function testShortListCommandHelp(): void
    {
        $commandResult = $this->console->runCli('-l', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testFindRouteCommandV1(): void
    {
        $commandResult = $this->console->runCli('--find-route', ['/test/', 'GET']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === 'OK';

        $this->assertTrue($result);
    }

    public function testFindRouteCommandHelp(): void
    {
        $commandResult = $this->console->runCli('--find-route', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testFindRouteCommandV2(): void
    {
        $commandResult = $this->console->runCli('--find-route', ['/', 'POST']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === 'Not found.';

        $this->assertTrue($result);
    }

    public function testFindRouteCommandV3(): void
    {
        $commandResult = $this->console->runCli('--find-route', ['/not', 'GET']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === 'Not found.';

        $this->assertTrue($result);
    }
    public function testFindRouteCommandV4(): void
    {
        $commandResult = $this->console->runCli('--find-route', ['/', 'GET']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === 'OK';

        $this->assertTrue($result);
    }

    public function testFindRouteCommandV5(): void
    {
        $commandResult = $this->console->runCli('-fr', ['/test/', 'GET']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === 'OK';

        $this->assertTrue($result);
    }

    public function testFindRouteCommandV6(): void
    {
        $commandResult = $this->console->runCli('--find-route', ['http://site.ru/test/']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === 'OK';

        $this->assertTrue($result);
    }

    public function testFindRouteCommandV7(): void
    {
        $commandResult = $this->console->runCli('-fr', ['http://site.ru/test/undefined']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === 'Not found.';

        $this->assertTrue($result);
    }

    public function testFindRouteCommandV8(): void
    {
        $commandResult = $this->console->runCli('--find-route', ['http://site.ru/test/', 'GET']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === 'OK';

        $this->assertTrue($result);
    }

    public function testFindRouteCommandV9(): void
    {
        $commandResult = $this->console->runCli('--find-route', ['https://site.ru/test/?test=12345#1000', 'GET']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === 'OK';

        $this->assertTrue($result);
    }

    public function testLockProjectCommand(): void
    {
        $result = $this->console->runCli('--lock-project');

        $path = HLEB_GLOBAL_DIR . '/storage/cache/routes/lock-status.info';

        $result = $result && file_exists($path) && (bool)trim((string)file_get_contents($path));

        $this->assertTrue($result);
    }

    public function testUnlockProjectCommand(): void
    {
        $this->console->runCli('--unlock-project');

        $path = HLEB_GLOBAL_DIR . '/storage/cache/routes/lock-status.info';

        $result = file_exists($path) && !((bool)trim((string)file_get_contents($path)));

        $this->assertTrue($result);
    }

    public function testLockProjectCommandHelp(): void
    {
        $commandResult = $this->console->runCli('--lock-project', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testUnlockProjectCommandHelp(): void
    {
        $commandResult = $this->console->runCli('--unlock-project', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && str_starts_with(trim($content), '[HELP]');

        $this->assertTrue($result);
    }

    public function testReturnArgumentsHelp(): void
    {
        $commandResult = $this->console->runCli('define-argument-feature', ['--help']);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === '[HELP] RETURN_COMMAND_ARGUMENTS';

        $this->assertTrue($result);
    }

    public function testReturnArgumentsV1(): void
    {
        $commandResult = $this->console->runCli('define-argument-feature');
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === '';

        $this->assertTrue($result);
    }

    public function testReturnArgumentsV2(): void
    {
        $args = '0 1 2 3 4 5';
        $commandResult = $this->console->runCli("define-argument-feature", [$args]);
        $content = $this->console->getContent();
        $result = $commandResult && trim($content) === $args;

        $this->assertTrue($result);
    }

    public function testRouteInfoCommandV1(): void
    {
        $this->console->runCli('--route-info', ['/test/', 'GET', 'localhost', 'json']);
        $content = json_decode($this->console->getContent(), true);
        $origin = [
            'name' => '-',
            'address' => 'test',
            'view' => 'text',
        ];

        $this->assertArrayEquals($origin, $content);
    }

    public function testRouteInfoCommandV2(): void
    {
        $this->console->runCli('-ri', ['/test/', 'GET', 'localhost', 'json']);
        $content = json_decode($this->console->getContent(), true);
        $origin = [
            'name' => '-',
            'address' => 'test',
            'view' => 'text',
        ];

        $this->assertArrayEquals($origin, (array)$content);
    }

    public function testRouteInfoCommandV3(): void
    {
        $commandResult = $this->console->runCli('--route-info', ['/', 'POST']);
        $content = $this->console->getContent();
        $result = !$commandResult && trim($content) === 'Not found.';

        $this->assertTrue($result);
    }

    public function testRouteInfoCommandV4(): void
    {
        $this->console->runCli('--route-info', ['/test/controller/', 'GET', 'localhost', 'json']);
        $content = json_decode($this->console->getContent(), true);
        $origin = [
            'name' => '-',
            'address' => 'test/controller',
            'class' => 'App\Controllers\TestController',
            'method' => 'methodName',
            'search' => 'App\Controllers\TestController:methodName()',
        ];

        $this->assertArrayEquals($origin, (array)$content);
    }

    public function testRouteInfoCommandV5(): void
    {
        $this->console->runCli('--route-info', ['/test/module/', 'GET', 'localhost', 'json']);
        $content = json_decode($this->console->getContent(), true);
        $origin = [
            'name' => '-',
            'address' => 'test/module',
            'class' => 'Modules\Example\Controllers\ExampleModuleController',
            'method' => 'get',
            'search' => 'Modules\Example\Controllers\ExampleModuleController:get()',
        ];

        $this->assertArrayEquals($origin, (array)$content);
    }

    public function testRouteInfoCommandV6(): void
    {
        $this->console->runCli('-ri', ['/name/', 'GET', 'localhost', 'json']);
        $content = json_decode($this->console->getContent(), true);
        if (is_array($content) && isset($content['search']) && !str_ends_with($content['search'], 'map.php:8')) {
           $this->assertFalse(true);
        }
        unset($content['search']);
        $origin = [
            'name' => 'test.name',
            'address' => 'name',
            'view' => 'text',
            'path' => '@/routes/map.php',
        ];

        $this->assertArrayEquals($origin, (array)$content);
    }

    public function testRouteInfoCommandV7(): void
    {
        $this->console->runCli('-ri', ['https://localhost:8000/test/', 'GET', '-', 'json']);
        $content = json_decode($this->console->getContent(), true);
        $origin = [
            'name' => '-',
            'address' => 'test',
            'view' => 'text',
        ];

        $this->assertArrayEquals($origin, (array)$content);
    }
}