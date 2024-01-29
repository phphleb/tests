<?php

declare(strict_types=1);

namespace Phphleb\tests\system\console\tests;

use App\Dto\DiControllerEmptyDto;
use Hleb\Reference\LogReference;
use Phphleb\TestO\TestCase;
use Phphleb\Tests\ConsoleInit;

/**
 * Тестирование консольных команд фреймворка вместе с событиями.
 */
class EventTaskTest extends TestCase
{
    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    public function testExampleEventTask1(): void
    {
        $commandResult = $this->console->runCli('example/test2iod1276vc12c-task');
        $content = $this->console->getContent();

        $this->assertTrue($commandResult && $content === '_TASK_EVENT-1_[arg]');
    }

    public function testExampleEventTask2(): void
    {
        $commandResult = $this->console->runCli('example/test8iod1876vf18f-task');
        $content = $this->console->getContent();

        $this->assertTrue($commandResult && $content === '_EVENT-BEFORE-2__TASK_EVENT-2_[arg2]_EVENT-AFTER-2_');
    }
}