<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use ErrorException;
use Hleb\Constructor\Cache\RouteMark;
use Hleb\Static\System;

class ConsoleInit
{

    private int $code = 0;

    private string $content = '';

    private const VENDOR_DIR = __DIR__ . '/../../../../../vendor';

    private const ROUTE_DIR = __DIR__ . '/directories/storage/cache/routes';

    /**
     * Инициализация консольного загрузчика.
     */
    public function __construct()
    {
        defined('HLEB_GLOBAL_DIR') or define('HLEB_GLOBAL_DIR', __DIR__ . '/directories');
        defined('HLEB_MODULES_DIR') or define('HLEB_MODULES_DIR', __DIR__ . '/directories/modules');

        if (!is_dir(self::VENDOR_DIR . '/phphleb/framework')) {
           throw new ErrorException('Sorry, testing can only be done if the libraries are in the `vendor` folder.');
        }
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Выполнение определенной консольной команды.
     * Возвращает статус успешности выполнения.
     */
    public function runCli(string $command, array $arguments = [], bool $isMinimal = false): bool
    {
        $argv = implode(' ', $arguments);

        $name = $isMinimal ? 'init-min' : 'init';

        $dir = __DIR__;
        ob_start();
        passthru("php $dir/$name.php $command $argv", $resultCode);

        $this->code = $resultCode;

        $this->content = ob_get_clean();

        return $resultCode === 0;
    }

    /**
     * The framework does not rollback the route caching time,
     * so this function resets the log to its original state.
     *
     * Во фреймворке не предусмотрен откат времени кеширования маршрутов,
     * поэтому эта функция приводит лог в исходное состояние.
     */
    public function updateRouteCacheTime(int $time): void
    {
        $infoFile = $this->getInfoFile();
        $data = file($infoFile, FILE_IGNORE_NEW_LINES);
        foreach($data as &$line) {
            if (str_contains($line, "'time' =>")) {
                $line = "      'time' => $time,";
            }
        }
        file_put_contents($infoFile, trim(implode(PHP_EOL, $data)) . PHP_EOL);
    }

    public function getRouteCacheTimeData(): int
    {
        $infoFile = $this->getInfoFile();
        $data = file($infoFile, FILE_IGNORE_NEW_LINES);
        foreach($data as &$line) {
            if (str_contains($line, "'time' =>")) {
                return (int)trim(trim(strstr($line, '>')), '> ,');
            }
        }
        return 0;
    }

    private function getInfoFile(): false|string
    {
        $files = \glob(self::ROUTE_DIR . DIRECTORY_SEPARATOR . RouteMark::INFO_CLASS_NAME . "*");
        return end($files);
    }
}
