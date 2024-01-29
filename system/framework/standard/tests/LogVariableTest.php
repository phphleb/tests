<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы механизма логирования
 */
class LogVariableTest extends TestCase
{
    private const LEVELS = ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'];

    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testBaseLog(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/example-test-log/controller/warning/function/log';
        $commandResult = $this->framework->run($params);
        $result = trim($commandResult) === 'WARNING: #warning';

        $this->assertTrue($result);
    }

    public function testVariableLog(): void
    {
        $types = ['function', 'container'];
        $levels = self::LEVELS;
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;
        foreach ($levels as $level) {
            foreach ($types as $type) {
                $this->assertTrue($this->checkLevel($params, $config, $level, $type, 'log'));
                $this->assertTrue($this->checkHigherLevel($params, $config, $level, $type, 'log'));
                $this->assertTrue($this->checkLoverLevel($params, $config, $level, $type, 'log'));
            }
        }
        foreach ($levels as $level) {
            foreach ($types as $type) {
                $this->assertTrue($this->checkLevel($params, $config, 'log', $type, $level));
                $this->assertTrue($this->checkHigherLevel($params, $config, 'log', $type, $level));
                $this->assertTrue($this->checkLoverLevel($params, $config, 'log', $type, $level));
            }
        }
    }

    private function checkLevel(array $params, array $config, string $level, string $type, ?string $target): bool
    {
        $params['SERVER']['REQUEST_URI'] = "/example-test-log/controller/$level/$type/$target";
        $config['common']['max.log.level'] = $level === 'log' ? $target : $level;
        $commandResult = $this->framework->run($params, $config);
        $message = strtoupper($level) . ($level === 'log' ? "($target): #$target" : ': #' . $level);

        return $message === trim($commandResult);
    }

    private function checkHigherLevel(array $params, array $config, string $level, string $type, ?string $target): bool
    {
        $fixLevel = $level === 'log' ? $target : $level;
        $position = array_search($fixLevel, self::LEVELS, true);
        $config['common']['max.log.level'] = $fixLevel;
        if ($position < count(self::LEVELS) && isset(self::LEVELS[$position + 1])) {
            $level = self::LEVELS[$position + 1];
        } else {
            return true;
        }
        $params['SERVER']['REQUEST_URI'] = "/example-test-log/controller/$level/$type/$target";
        $commandResult = $this->framework->run($params, $config);

        return trim($commandResult) === '';
    }

    private function checkLoverLevel(array $params, array $config, string $level, string $type, ?string $target): bool
    {
        $fixLevel = $level === 'log' ? $target : $level;
        $position = array_search($fixLevel, self::LEVELS, true);
        $config['common']['max.log.level'] = $fixLevel;
        if ($position < count(self::LEVELS) && isset(self::LEVELS[$position - 1])) {
            $level = self::LEVELS[$position - 1];
        } else {
            return true;
        }
        $params['SERVER']['REQUEST_URI'] = "/example-test-log/controller/$level/$type/$target";
        $commandResult = $this->framework->run($params, $config);
        $message = strtoupper($level) . ($level === 'log' ? "($target): #$target" : ': #' . $level);

        return $message === trim($commandResult);
    }
}