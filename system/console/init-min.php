<?php

use Phphleb\Tests\TestConsoleErrorException;
use Hleb\HlebBootstrap;
use Hleb\Main\Logger\LoggerInterface;
use Hleb\HlebConsoleBootstrap;

try {
    define("HLEB_START", microtime(true));

    defined('HLEB_GLOBAL_DIR') or define('HLEB_GLOBAL_DIR', __DIR__ . '/directories');
    defined('HLEB_MODULES_DIR') or define('HLEB_MODULES_DIR', __DIR__ . '/directories/modules');
    defined('HLEB_VENDOR_DIR') or define('HLEB_VENDOR_DIR', __DIR__ . '/../../../../../vendor');

    if (!class_exists(HlebBootstrap::class)) {
        require HLEB_VENDOR_DIR . '/phphleb/framework/HlebBootstrap.php';
    }
    if (!class_exists(HlebConsoleBootstrap::class)) {
        require HLEB_VENDOR_DIR . '/phphleb/framework/HlebConsoleBootstrap.php';
    }
    if (!class_exists(LoggerInterface::class)) {
        require HLEB_VENDOR_DIR . '/phphleb/framework/Main/Logger/LoggerInterface.php';
    }
    if (!class_exists('Phphleb\Tests\Logger')) {
        require __DIR__ . '/../logger/TestLogger.php';
    }
    if (!class_exists(TestConsoleErrorException::class)) {
        require __DIR__ . '/TestConsoleErrorException.php';
    }

    $config = [
        'common' => [
            'debug' => false,
            'log.enabled' => true,
            'max.cli.log.level' => 'debug',
            'app.cache.on' => true,
        ],
        'system' => [
            'classes.autoload' => true,
        ],
    ];

    exit((new Hleb\HlebConsoleBootstrap(config: $config))
        ->setLogger(new Phphleb\Tests\Logger\TestLogger())
        ->load());

} catch (\Throwable $t) {
    echo $t->getMessage();
    exit(1);
}
