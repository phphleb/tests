<?php

declare(strict_types=1);

namespace Phphleb\Tests\Logger;

use Hleb\Main\Logger\LoggerInterface;
use Phphleb\TestO\TestCase;
use Hleb\Init\ErrorLog;

/**
 * Testing the functionality of the error logging mechanism.
 *
 * Тестирование работоспособности механизма логирования ошибок.
 */
class ErrorLogTest extends TestCase
{
    private LoggerInterface $logger;

    public function __construct()
    {
        require __DIR__ . '/../console/console_autoloader.php';

        defined('HLEB_LOAD_MODE') or define('HLEB_LOAD_MODE', 1);
        defined('HLEB_CLI_MODE') or define('HLEB_CLI_MODE', false);

        ErrorLog::setLogger(new TestLogger());
    }

    public function testRunLogger(): void
    {
        $this->assertTrue(str_starts_with($this->getLog(new \ErrorException('#1')), 'ERROR: #1'));
    }

    public function testRunLogError(): void
    {
        $this->assertTrue(str_starts_with($this->getBaseError(new \ErrorException('#1')), '#1'));
    }

    private function getLog(\Throwable $t): string
    {
        ob_start();
        try {
            ErrorLog::handle($t);
        } catch (\Throwable) {
        }
        return (string)ob_get_clean();
    }

    private function getBaseError(\Throwable $t): string
    {
        ob_start();
        try {
            ErrorLog::handle($t);
        } catch (\Throwable $e) {
           $result = $e->getMessage();
        }
        ob_get_clean();

        return $result;
    }

}