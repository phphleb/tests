<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;
use Phphleb\Tests\ConsoleInit;

/**
 * Тестирование возвращаемых ошибок.
 */
class MinimalConfigTest extends TestCase
{
    private ConsoleInit $console;

    public function __construct()
    {
        require __DIR__ . '/../console_autoloader.php';

        $this->console = new ConsoleInit();
    }

    public function testMinHealthCheck(): void
    {
        $commandResult = $this->console->runCli('test113bd4ad28404a-task', isMinimal: true);
        $result = $this->console->getContent();

        $this->assertTrue($result === 'test_task_message');
    }

}
